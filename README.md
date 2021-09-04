![repository-open-graph-template (1)](https://user-images.githubusercontent.com/16690527/100493128-d4764a00-30e8-11eb-9415-853093d31d18.jpg)

# OpusVid
[![Generic badge](https://img.shields.io/badge/CV-v1.0b1-302E91.svg?style=for-the-badge)](#community-version-cv) [![Generic badge](https://img.shields.io/badge/RL-X-E57373.svg?style=for-the-badge)](#regular-license-rl) [![Generic badge](https://img.shields.io/badge/EL-X-E57373.svg?style=for-the-badge)](#extended-license-el) [![Generic badge](https://img.shields.io/badge/Built_By-DevLexicon-4524E8.svg?style=for-the-badge)](https://devlexicon.ca) [![Generic badge](https://img.shields.io/badge/Twitter-DevLexicon-1DA1F2.svg?style=for-the-badge&logo=twitter)](https://twitter.com/devlexicon) [![Generic badge](https://img.shields.io/badge/Discord-pUAgE2qdqT-7289DA.svg?style=for-the-badge&logo=discord)](https://discord.gg/pUAgE2qdqT)

NOTE: CV1.0B2 is under production review and should be released in the next few weeks 🎉

##
[Demo](#demo) | [Versions](#streams) | [Requirements](#what-you-will-need) | [Installation](#installation) | [Changelog](https://github.com/DevLexicon/OpusVid/blob/master/CHANGELOG.md)
##

Opus Vid is a portal for all your pieces of videography(Vid) work(Opus).

## What is OpusVid?
OpusVid is a video content management system or CMS for short. With this video CMS (powered by the [DevLexicon Content Management System (dLCMS)](https://devlexicon.ca) by DevLexicon) user are able to create accounts, login to to a dashboard area, upload videos, manage their videos, watch other videos uploaded by other Opus Creators, and more!

## Why was OpusVid created?
If you would like you can read the [Project Proposal](https://viu.donaldlouch.ca/digi405/proposal.html) for more information on the rational behind the project!

## Demo
You may demo OpusVid at [opusvid.devlexicon.ca](https://opusvid.devlexicon.ca).

## Streams
OpusVid will have multiple streams of licenses and Beta's.

There will be a FREE open source Community Version (CV) then there will be two different licenses versions which will be a paid version. There will be differences between all and will be explained in the following sections.

**At this point there is only the CV in the form of a very early public beta also known as, CV 1.0 Beta 1.**

### Community Version (CV)
The **Community Version (CV)** will be a **FREE** version of OpusVid in which is open sourced. This version will be available here on [GitHub](https://github.com/DevLexicon/OpusVid/).

With the CV, the documentation will be very limited and bare-bone similar to the documentation that is seen below in the [Installation](https://github.com/DevLexicon/OpusVid#installation) section. 

In addition, once the full script is launched the CV will only receive major updates and will receive them at a later time than the other versions. For instance, the paid version will get version 1.0.1, 1.0.2, 1.1, etc. Whereas, the CV will only get version 1.0, 2.0.

The CV will not include much support from DevLexicon (the developers of OpusVid) and will be encouraged to use the "**[Issues](https://github.com/DevLexicon/OpusVid/issues)**" tab on the GitHub repository. For the beta versions before it hit’s the RL, EL, and BDV streams, the support for OpusVid will be a little more advanced to make sure a smooth transition and will show where improvements are needed.

If you submit multiple "**Pull requests**" that are beneficial to the script, DevLexicon may decide to award you a paid license for free.

### Regular License (RL)
The **Regular License (RL)** version will include all releases of OpusVid post launch. Included will be versions such as  1.0.1, 1.0.2, 1.1, etc. These releases will be available as soon as they are available.

With the RL version you will also get more detailed documentation to help with configuration, troubleshooting, and overall improvement tips. 

The RL and EL will also receive the ability to receive support from DevLexicon. The RL will receive medium level support (such as, basic configurations and basic troubleshooting | Slow Support) and the EL will receive high level support (advanced configuration and troubleshooting | Fast support). The support will be offered through “work orders” through the [DevLexicon Portal (Work Orders Coming Soon!)](https://devlexicon.ca).

Pricing and arability will be announced soon along with the launch of the first version of the OpusVid Script.

### Extended License (EL)
The **Extended License (EL)** version will include all releases of OpusVid post launch. Included will be versions such as  1.0.1, 1.0.2, 1.1, etc. These releases will be available as soon as they are available.

With the EL version you will also get more detailed documentation to help with configuration, troubleshooting, and overall improvement tips. 

The RL and EL will also receive the ability to receive support from DevLexicon. The RL will receive medium level support (such as, basic configurations and basic troubleshooting | Slow Support) and the EL will receive high level support (advanced configuration and troubleshooting | Fast support). The support will be offered through “work orders” through the [DevLexicon Portal (Work Orders Coming Soon!)](https://devlexicon.ca).

Pricing and arability will be announced soon along with the launch of the first version of the OpusVid Script.

### By Donation Version (BDV)
The **By Donation Version (BDV)** version will include all releases of OpusVid post launch. Included will be versions such as  1.0.1, 1.0.2, 1.1, etc. These releases will be available as soon as they are available.

With the BDV as long as you spend over a certain amount, it will contain more detailed documentation to help with configuration, troubleshooting, and overall improvement tips. 

The BDV will also receive the ability to receive support from DevLexicon. The levels will range from low level support (such as base troubleshooting | Slowest Support). To the same as RL which will receive medium level support (such as, basic configurations and basic troubleshooting | Slow Support). To the same as EL which will receive high level support (advanced configuration and troubleshooting | Fast support). The support will be offered through “work orders” through the [DevLexicon Portal (Work Orders Coming Soon!)](https://devlexicon.ca).

Pricing and arability will be announced soon along with the launch of the first version of the OpusVid Script.

## What You Will Need
- [ ] [Google Captcha v3](https://developers.google.com/recaptcha) Site and Secret Keys
- [ ] [DigitalOcean Spaces Bucket](https://m.do.co/c/237705dc5b02) (for base configuration)
- [ ] PHP Tested Only On: **PHP 7.4** (backwards and forwards compatibility untested at this time)
- [ ] (Pre Installed) [AWS SDK for PHP](https://aws.amazon.com/sdk-for-php/) Version 3.164.0

## Installation
### Setup (Part 1)
- [DigitalOcean Spaces](https://m.do.co/c/237705dc5b02) (copy the Key and Secret | Create a “root folder” for your OpusVid script)
- [Google Captcha v3](https://developers.google.com/recaptcha) (copy the Site Key and Secret Key)
- Setup server with domain and file structure; and MySQL
- Download OpusVid Script (rather by downloading the “**[Release](https://github.com/DevLexicon/OpusVid/tree/release)** > **Code**” or [cv1.0b1](https://github.com/DevLexicon/OpusVid/releases/tag/cv1.0b1))
- Download **Additional Files** From [DevLexicon Files NEW LINK COMING SOON!]()
- Upload the “**OpusVid Script**” to your server
- Upload all the **Additional Files** > “**FOR DOSPACES**” folders to your DigitalOcean Spaces root folder for your OpusVid script
- Upload the **Additional Files** > **opus.sql** file to your **phpMyAdmin**
- Update the SQL settings (`database name > settings`) with all relevant information such as “Site URL”, “Site Name”, “Spaces Key”, “Spaces Secret”,  “Spaces Bucket”, and other Spaces settings, “Google Captcha Site Key” and “Google Captcha Secrete Key”
- Create your Favicon (**https://realfavicongenerator.net/**) 
- Upload the Favicon to `OpusVid Script Root Folder > storage > favicon`

### .htaccess
- Go to your OpusVid Script Root Folder and open the “ `.htaccess`” file (You may need to go into your FTP/Server settings and “`Show Hidden Files`")
- Edit “`{WEBSITE URL}`” with your URL (**must include https://**) on `line 5` and `line 14`

### Setup (Part 2)
- Enter your SQL login information in the `models > classes > MySQL.class.php`
- Go to your OpusVid website
- Click the “Dashboard” button at the top or **DOMAIN.NAME/login**
- Login with “`SignupAccount`” and “`123456Abc!`”
- Go through the “**views** > **blades** > **errors.php**” and customize the error messages as to you see fit.
- Set the max video and thumbnail sizes that you want user to upload in `controllers > database > videoUpload-S2.database.php`, and in the errors file (“**views** > **blades** > **errors.php**”)

### Settings (Fill out and update all settings that you want)
- `"Dashboard" > “Administration +” > “EDIT: Terms of Service”`
- `"Dashboard" > “Administration +” > “Website Settings”`
- `"Dashboard" > “Administration +” > “CSS Settings”`

Note that if you want more custom styling that aren’t to do with colours or fonts, you will need to do so via the stylesheet.css file found under views > css > stylesheet.css. Also if you change the font to another Google Font, font then you will need to update the import code in the stylesheet as well. Note that any changed made here will not transfer if you update the script.

### Account
You can rather chose to use the already made “SignupAccount” and just change the settings (`"Dashboard" > “Administration +” > “Account Management” > “Edit User" beside the “SignupAccount”`). Or you can “Logout” and create a new user with the settings that you want, then log back in to the “SignupAccount” and change the user status from “user” to “admin” (`"Dashboard" > “Administration +” > "Account Management” > “Edit User” beside the “{NEWUSERNAME}”`) on the newly created account, then login to the new account and then delete the “SignupAccount” (`"Dashboard" > "Administration +” > “Account Management” > “Delete User” beside the “SignupAccount”`).

### Categories
If changing any categories you MUST change them on the following files:
- `views > pages > frontEnd > categories.php`
- `views > pages > backEnd > upload_s2.php`
- `views > pages > backEnd > edit_video.php`
- `views > pages > backEnd > admin_edit_video.php`

Note that any changed made here will not transfer if you update the script.

### Notes
Please note that at this time there is no way of checking to make sure you have the latest version of OpusVid. So please follow us on [Twitter](https://twitter.com/DevLexicon) or check back here on [GitHub](https://github.com/DevLexicon/OpusVid). Or you can follow our [Discord Server](https://discord.gg/pUAgE2qdqT) for updates and community help with issues you may run into.

Also note that any changes made the files within OpusVid are subject to change and loss during updating.

## Changelog
For Changelog please visit [CHANGELOG.md](https://github.com/DevLexicon/OpusVid/blob/master/CHANGELOG.md)

## License
[MIT](https://github.com/DevLexicon/OpusVid/blob/master/LICENSE) © 2020 DevLexicon
