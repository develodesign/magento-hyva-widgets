<?php

declare(strict_types=1);

namespace Develodesign\CmsWidgets\Plugin\Model;

use Magento\Framework\DataObject;
use Magento\Framework\Escaper;
use Magento\Framework\Math\Random as MathRandom;
use Magento\Widget\Helper\Conditions;

class Widget
{
    /**
     * @var Escaper
     */
    private $escaper;

    /**
     * @var Conditions
     */
    private $conditionsHelper;

    /**
     * @var MathRandom
     */
    private $mathRandom;

    public function __construct(Escaper $escaper, Conditions $conditionsHelper, MathRandom $mathRandom)
    {
        $this->escaper = $escaper;
        $this->conditionsHelper = $conditionsHelper;
        $this->mathRandom = $mathRandom;
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function aroundGetWidgetDeclaration(
        \Magento\Widget\Model\Widget $subject,
        \Closure $proceed,
        $type,
        $params = [],
        $asIs = true
    ) {

        $widget = $subject->getConfigAsObject($type);

        $params = array_filter($params, function ($value) {
            return $value !== null && $value !== '';
        });

        $directiveParams = '';
        foreach ($params as $name => $value) {
            // Retrieve default option value if pre-configured
            $directiveParams .= $this->getDirectiveParam($widget, $name, $value);
        }

        $directive = sprintf('{{widget type="%s"%s%s}}', $type, $directiveParams, $this->getWidgetPageVarName($params));

        if ($asIs) {
            return $directive;
        }

        return sprintf(
            '<img id="%s" src="%s" title="%s">',
            $this->idEncode($directive),
            $subject->getPlaceholderImageUrl($type),
            $this->escaper->escapeUrl($directive)
        );
    }

    private function getDirectiveParam(DataObject $widget, string $name, $value): string
    {
        if ($name === 'conditions') {
            $name = 'conditions_encoded';
            $value = $this->conditionsHelper->encode($value);
        } elseif (is_string($value) && strrpos($value, PHP_EOL) !== false) {
            $value = str_replace('"', "'", $value);
        } elseif (is_array($value)) {
            $value = $this->prepareArrayValue($value);
        } elseif (trim($value) === '') {
            $parameters = $widget->getParameters();
            if (isset($parameters[$name]) && is_object($parameters[$name])) {
                $value = $parameters[$name]->getValue();
            }
        } else {
            $value = $this->getPreparedValue($value);
        }

        return sprintf(' %s="%s"', $name, $this->escaper->escapeHtmlAttr($value, false));
    }

    /***
     * @param array[] $data
     * @return string
     */
    protected function prepareArrayValue(array $data): string
    {
        $preparedValue = [];
        $asJson = false;
        foreach ($data as $value) {
            if (is_array($value)) {
                $asJson = true;
                if (!empty($value['delete'])) {
                    continue;
                }
                $preparedValue[] = $value;
            }
        }

        return $asJson ? str_replace('"', "'", json_encode($preparedValue)) : implode(',', $data);
    }

    private function getWidgetPageVarName(array $params = []): string
    {
        $pageVarName = '';
        if (array_key_exists('show_pager', $params) && (bool)$params['show_pager']) {
            $pageVarName = sprintf(
                ' %s="%s"',
                'page_var_name',
                'p' . $this->mathRandom->getRandomString(5, MathRandom::CHARS_LOWERS)
            );
        }
        return $pageVarName;
    }

    private function idEncode(string $string): string
    {
        return strtr(base64_encode($string), '+/=', ':_-');
    }

    private function getPreparedValue(string $value): string
    {
        $pattern = sprintf('/%s/', implode('|', ['}', '{']));

        return preg_match($pattern, $value) ? rawurlencode($value) : $value;
    }
}
