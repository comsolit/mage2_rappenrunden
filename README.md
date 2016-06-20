**Comsolit RappenRunden Magento2 Extension**

Introduction
============

This simple magento 2 module listens to the magento2 internal round() function and rounds the price before to 1/20th (0.05).
For example, a value of 1,23 will be rounded up to 1,25 and a value of 0,97 will be rounded down to 0,95.

This functionality is particularly wide-spread in Switzerland.

Requirements
============

* Magento version 2.0.0 or greater


Installation
============

**With Composer

**Without Composer

Copy the files to app/code/


Enable the Module
============
In the backend go to Stores -> Configuration -> Comsolit -> Rappen Runden -> General -> Enable Rappen Runden and set the 
Option to 'Yes' to enable the module. Do not forget to refresh your cache.