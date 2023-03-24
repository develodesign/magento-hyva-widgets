<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->
**Table of Contents**

- [Magento-Hyva-widgets](#magento-hyva-widgets)
  - [About the Project](#about-the-project)
  - [Built with](#built-with)    
  - [Installation](#installation)    
  - [Usage](#usage)     
  - [Contact](#contact)
  

<!-- END doctoc generated TOC please keep comment here to allow auto update -->







# Magento-Hyva-widgets
A collection of UI Components created using Tailwind that can be easily added via Magento's admin via PB or CMS page editor. The widgets are useful when wanting to add custom elements to your page more easily without having to hard-code any of the content. 







## About the Project

This project has 6 Hyva-widgets that have been created using the Hyva-Magento-default theme and Tailwind. The 6 Hyva-Widgets include:

* **FAQ widget**: A widget that displays content as an FAQ block.


![FAQ](https://user-images.githubusercontent.com/102522996/227517293-36937211-70d3-460a-bc1b-45f646abdcb6.png)


* **Quotes-Block widget**: A widget that displays content for quotes in a row including author and company.


![image (4)](https://user-images.githubusercontent.com/102522996/227515281-268138ed-0b1f-4e85-bd20-b302bb0ce4b6.png)



* **Horizontal-Advert widget**: A widget that is a horizontal advert which includes a text,background image and colour, button and icon image.


![horizontal-advert png](https://user-images.githubusercontent.com/102522996/227517885-74e406e2-01d6-419a-9639-a336016a1528.png)



* **Featured-Image-Block widget**: A widget that has a block of images with line colour, title and text.


![Featured-image](https://user-images.githubusercontent.com/102522996/227517860-403e5bce-46de-48da-80de-f9cd518ccef3.png)



* **Featured-Icon-Block widget**: A widget that also has a block of images displaying with title and text for each image where all content is centred.


![Featured-icon](https://user-images.githubusercontent.com/102522996/227517842-6c634798-acf1-488f-bb30-61d561abcc25.png)



* **Content-Block widget**: A widget that has an image or content either in the left or right side in a 1:1 ratio. 


![Content-block](https://user-images.githubusercontent.com/102522996/227517817-31bde2a9-4fcb-4a5d-9bff-d9372d753664.png)



## Built with

The Hyva-Widgets are built using:

* **Magento 2.4.4**
* **Hyva-themes/Magento2-default-theme 1.1**
* **Tailwind 2.1.5**



## Installation

**1**. To be able to use the Hyva-Widgets download the folders and upload to your local/cloud environment into app/code folder.

**2**. Then run the following commands in the terminal:                                                                                              
    -bin/magento setup:upgrade
    -bin/magento setup:di:compile

**3**. After running the setup commands you can then check the status of the module by running:
       php bin/magento module:status Develodesign_HyvaCmsWidgets
       
**4**. If the module is disabled  you can enable by running:
    -bin/magento module:enable Develodesign_HyvaCmsWidgets
        
        
**5**. Final steps are to clear the cache before using the modules:
    -bin/magento cache:clean
    -bin/magento cache:flush

  


## Usage

After the installation of the required applications and dependencies the widgets can now be added in the Page-builder. These can be found in the admin page.

**1**. Enusre that web-page is configured using the Hyva- theme in the admin by going to *Content > Design > Configuration* and in the actions column set to *Hyva-default*

![Hyva-default-theme](https://user-images.githubusercontent.com/102522996/227527077-a40043ff-99df-410e-83b0-4f184d67d03a.png)




**2**. The Hyva-Widgets then can be added by going to *Content > Pages* and clicking on *Edit* in *Action* column for the specific page.

![edit-page](https://user-images.githubusercontent.com/102522996/227529543-ac8bcf3e-5715-4ad1-a0b7-652d7d4efbef.png)

**3**. Once your inside the Page builder by clicking on *Edit with Page-builder* a row or column needs to be added to the page and text element. Inside of the text element click on *edit* and then *insert widget* icon. 

![Widget-icon](https://user-images.githubusercontent.com/102522996/227531396-636fece9-9c1c-43cf-9c69-ef75448d77af.png)

**4**. Widgets can now be selected and added.

![Add-Widgets](https://user-images.githubusercontent.com/102522996/227548778-e6b12fc1-ac9d-490c-ad4c-e67033a0779a.png)

**5**. Final step is to add content in the relevant sections for the widget you choose and click on *insert widget* to save and then to save again in the Page-builder home-page. 
   
![insert-widget-to-save](https://user-images.githubusercontent.com/102522996/227553803-f723d40a-712b-433c-8691-73c87e72e4ca.png)

![save-widget-pagebuilder](https://user-images.githubusercontent.com/102522996/227554098-3a3e4502-fb21-4fe7-9923-3fc75bdabbb5.png)
   




## Contact

If you have any questions about the Hyva-Magento Widgets that are in this project you can contact us at: info@develodesign.co.uk



