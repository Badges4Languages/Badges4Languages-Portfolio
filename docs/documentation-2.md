# Badges-Issuer-for-wp Documentation 2

## Installation and Upgrades
1. Clone (or copy) this repository to the /wp-content/plugins/ directory
1. Activate the plugin through the 'Plugins' screen in WordPress

For upgrades, download the las stable version from github, delete from FTP the old plugin and install the new one.

### Installing Required Plugins
If we were to try to create our plugin without the use of existing plugin solutions we simply would not exist. There is no sustainable way to develop all the functionality needed for our plugin while still being able to offer a competitive price.

* [Badges-Issuer-for-wp](https://github.com/Badges4Languages/Badges-Issuer-for-wp/releases/)

### Integrated Theme
Any theme can work with Badges-Issuer-for-wp, but just themes that are integrated with Job Manager can use al the features of the plugin as both plugins are integrated.

At Books for Languages we use [Listify](https://themeforest.net/item/listify-wordpress-directory-theme/9602611] as the theme for the platform. Here is the link to the (documentation)[http://listify.astoundify.com/).



## Setup the plugin
### Plugin settings
#### Change the badges issuer informations
OpenBadges need some key information for the delivery of the badge. Without that information, the plugin will not work:
* Site Name
* Image URL
* WebSite URL
* Backpack account (mail)

#### Change issuer badges page links
The users have some shortcuts to make easy the process. Here are the place where the links to those shoutcuts are created:
* Change the role. From issues badges page to change the role page
* New class. Redirection page to creating a new class page

### Manage Roles
Badges-Issuer-for-wp offer 3 types of roles:
* Student
* Teacher
* Academy

Out of the box, a new user can be (after the login) one of those roles (upon the configuration of the site) and later the administrator can change the role to a more related one. If an automatization of the distribution of the roles are need it, RCP (or an alternative) must be activated and settup. A select the role page is need it (can be free or paid upon the configuration). Remember to Asign a match to each [subscription level](http://docs.restrictcontentpro.com/article/1558-creating-subscription-levels) with the user role.

The B4L Settings page allow in **Change issuer badges page links** to select the page where the [Register Form](http://docs.restrictcontentpro.com/article/1597-registerform) is created.

#### Student role
* Can receive badges and to keep the profile information.
* Can self issue a non certified badge.
* Can comment the class after receiving the badge.

#### Teacher role
The same as Student role plus:
* Can self issue a teacher badge.
* Can send a non certified badge to one student at a time.
* Save all the students information in one single class.
* Can answer the class Studens' comments.
* The profile can be delete but the Classes information can not ever be deleted.

#### Academy teacher role
* Can send a non certified badge to multiple students at a time.
* Can send a certified badge to one student/multiple students at a time.
* Can create multiple classes.

#### Administrator role
* Can send certified teachers badges

## Creation of the Badges
Badges-Issuer-for-wp allow the creation of two types of badges for the **Administartors** of the site. Normal badges and Certified badges.
* Normal badges can be delivery by any user of the site with Teacher Role.
* Certified badges are allowed just for teachers with the Academy Role.

For the creation of a badge is necessary:
* Name: The name of the badge.
* Description: A description for the badge.
* Badge Criteria: The Criteria for different languages (just the first one is used).
* Image: The feature image.

Other information is necessary for the correct integration with the site:
* Content: information about the badge.
* The Certification Type: Not certified/Certified.
* The Target type: Student/Teacher.
* Field of education: the subject of the class (The second language). Not used.
* Levels: the level of the class (Students: A1-A2-B1-B2-C1-C2; Teachers: T1-T2-T3-T4-T5-T6).

Optional:
* Description translations (WP Comments): A translation of the description.

## Sending of badges (Issuer page)
Badges-Issuer-for-wp allow to issue badges in 3 ways:

Administrators have the same functionalities as Academy teacher role plus the issue of certified Teacher badges.

Those are the options before to send a badge:
* language: the language the student learn.
* Level: the level of the class.
* Badge: the badge.
* Language of Badge description: by defaul the badges are created in english, but translations are available.
* Class: the student class name (with information such starting date and place).
* Receivers' mail address: the email of the student/s.
* Comment: a comment for the profile of the student/s.

### Issuer page Self mode
A student/Teacher/Academy teacher role can receive a badge as Student or Teacher (Non certified).

* Language
* Level
* Badge
* Language of Badge description
* Comment

### Issuer page Issue mode
A Teacher/Academy teacher role can send a Student Badge (Non-Certified). An Academy teacher role can send a Student Badge (Certified)

* Language
* Level
* Badge
* Language of Badge description
* Class
* Receiver's mail address
* Comment

### Issuer page Multiple issue mode
An Academy teacher role can send Multiple badges to Multiple students (Certified and Non-Certified).

* language
* Level
* Badge
* Language of Badge description
* Class
* Receivers' mail address
* Comment

## Creation of Classes

## User profile
All the roles have a profile for tracking the information of the receive badges.

The save information in the profile is:
* Badge name
* Badge language
* Sender
* Comment

## Shortcodes
The frond-end fuctionality can be use in any page with the shortcode [send_badges]



Manage Listings and Content Organization

7 articles
Theme Settings

Modify Settings in Appearance ▸ Customize

30 articles
Menus

Customize and Output Menus

12 articles
Pages

Page Templates and Archives

12 articles
Widget Areas

The What and Where of Widgets

6 articles
Widgets

Homepage and Listing Widgets

24 articles
## Customization
Appearance

Modify Colors and More

26 articles
Booking Service Integration

Book Tables, Services, and More

2 articles
Customization Code Snippets

Collection of Code

46 articles
Child Themes

Advanced Customization Techniques

4 articles
Translations

Change Text and Words

### Integrations
#### Porfolio Integration
Badges-Issuer-for-wp-Languages-Portfolio allow to create a portfolio for teacher and students of second languages.

Once activated, the portfolio will use the OpenBadges API for delivery of specific type of badges. Also the portfolio is used for the comprobation of the level of the teachers.
