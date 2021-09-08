CHANGELOG
================================================================================

## [CV1.0B2](https://github.com/DevLexicon/OpusVid/releases/tag/cv1.0b2) (DATE TBD)
We are happy to introduce OpusVid Community Version (CV) 1.0 Beta 2. With this update, we have made design changes in which we implemented from feedback from the first beta and modernized the styles with Glassmorphism UI and other cleaner styles. We have also moved away from requiring a third-party cloud storage solution such as DigitalOcean Spaces. With the addition of adding the ability to upload larger videos without straining your server. Furthermore we have made changes to the fullscreen mode and added a new theater mode.
### Improved Features

We have completely overhauled our video upload process to a three step process (Video Upload, Thumbnail Upload, and The Video Information) with partial file uploads on videos and thumbnails to allow for large file uploads without having the system crash.

We have a brand new design with an overhauled home video feed and video player with the movement of the comment section and new vectors. On the player UI we have implemented a Glassmorphism UI design with an underlay progress bar as the video progresses.

Within the Dashboard we have further extended the Glassmorphism design UI for a new look and layout of the Dashboard.

We have added more website and css settings to the SQL structure and reflected those on the setting pages.

Not only do we have new vectors for the player page, but we have also changed the file structure for vectors. We have further given the vectors a bit more of a "pop" with drop shadows that is now seen across all OpusVid Vectors.

We further have updated our title logo and initial logo. Thus, if you don't want to change these and not use your own logos, you can use our new logos and be seamless with the rest of the vectors. 

We have decided to change our main font from "Montserrat" to "Poppins".

### Introducing

Introducing the all new Theater Mode, which is seen on the player pages. With this mode it will replace to the full screen mode and expand the video to be a more full screen view by removing things such as chapters and the video information section. in a device full screen mode. Along with expanding the size of the video for better viewing.

With the newly revised Fullscreen Mode, it will expand the video in a device fullscreen mode and expand the video to fill your entire screen. 

With further added a category SQL function to allow for custom categories. The new categories function will be extended much further in feature releases. For now, you can only customize the categories on the PHPMyAdmin end, and this will only effect the "Categories" page.

Within the player page we have introduced a more streamed lined Music Credit section. With this, all music credits will be displayed in a uniform design. In future releases we are going to be expanding Music Credits in a more advance way.

Within the Dashboard when uploading a new video (on step 3), editing a video, or editing your profile, you will see a new listing function. With this, you will be able to easily add chapters, music credits, video credits, staring credits, and links to your videos and profile, without needing to manually format the items with ";;" and "||" that's all done for you through automatic code!

We have now added links to profiles. With this we have added button styling to the links that will allow for a more noticeable different between link and text.  

Introducing Dark Mode! With dark mode, when your device activates dark mode (typically at night or at sundown) you won't have to worry about bright colours and a bright UI, as we now have a black background and less eye straining colours in dark lights.

### Bug Fixes

We have fixed the following bugs:

- A bug where profile views weren't updating.
- A bug where the pagination on profile pages wouldn't link to the real next/previous feed.

We have further made partial fixes to the Google Captcha on Video Upload Steps 1,2, and 3, and other places within the website. Some bugs still maybe seen with Google Captcha. If you continue to get Captcha bugs, please don't hesitate to reach out to support@devlexicon.ca.

### Upgrade Notes

Before you upgrade to CV1.0B2 or any other version, please make sure to back up your current files and database files. Most importantly please make sure to backup your storage folders and database files. Due to the major updates in CV1.0B2 you will need to reupload all files to your sever. There is an upgrade script included that will automatically upgrade your database.

For more help with upgrading please visit: [https://github.com/DevLexicon/OpusVid#upgrade](https://github.com/DevLexicon/OpusVid#upgrade)

If you run into any issues with upgrading please don't hesitate to reach out to us at support@devlexicon.ca and we'll be happy to help!

### Notes on CV1.0B2

Even though we had made big changes to the responsiveness of the design, somethings still may not be fully optimized for small screens such as smartphone/iPads/etc.

In this update we made initial bases for advancements to the player page and more. There maybe some code that won't make sense at first but will later down the road.

## [CV1.0B1](https://github.com/DevLexicon/OpusVid/releases/tag/cv1.0b1) (December 3rd, 2020)
### Changes and Improvements
- Complete Code Overhaul. Change from PHP Procedural to PHP Object Oriented (OOP)
- Complete CSS and Design Overhaul
- The switch from Portfolio Project to Script 
- Different Version: (Community Version | Regular License | Extended License | By Donation Version) Announcement  
- Cleaner Code

### New
- Feature: Staring
- Feature: Embed
- Feature: Chapters
- Feature: Comments
- Feature: Profile Links
- Feature: Moderation
- Feature: Video Credits
- Feature: Tag Pages
- New Player UI

And more!

### Known Issues
- [Uploading Captch](https://github.com/DevLexicon/OpusVid/issues/21)
- [Responsive Design](https://github.com/DevLexicon/OpusVid/issues/12)
- [Slow Player UI](https://github.com/DevLexicon/OpusVid/issues/7)

### Roadmap
- [Volume slider option](https://github.com/DevLexicon/OpusVid/issues/4)
- [More Video player functions](https://github.com/DevLexicon/OpusVid/issues/4)
- [Staring Feature: displayed on Profile Pages](https://github.com/DevLexicon/OpusVid/issues/2)
- [Allow Opus Creators to accept/decline “Staring Requests”](https://github.com/DevLexicon/OpusVid/issues/2)
- [Code Improvements](https://github.com/DevLexicon/OpusVid/issues/5)
- [Full documentation](https://github.com/DevLexicon/OpusVid/issues/6)

## [v1.0b6](https://github.com/DevLexicon/OpusVid/releases/tag/v1.0b6) (Dec 7, 2018)
- Validated Code
- Commented PHP Code
- Installed Newest Version of AWS SDK
- Created a ReadMe file

## [v1.0b5](https://github.com/DevLexicon/OpusVid/releases/tag/v1.0b5) (Nov 23, 2018)
- Spelling Mistakes: Home Beta Info Page (fix to Feedback 1a)
- Responsive Design: Scroll Bug (Home Beta Info)(fix to Feedback 1b)
- Rearranged Signup Error Messages (fix to Feedback 2a)
- Added Support for adding hyphens in last name when Signing Up/Editing Profile - (fix to Feedback 2b)
- Implemented Checks For Thumbnail Extensions When Uploading a Video (fix to - Feedback 3c)
- Delayed View Count Update on Profiles (fix to Feedback 4a)
- Implemented Checks To See if Opus Creators are Viewing Their Own Profile (fix - to Feedback 4a)
- Changed Link To Player When Clicking Thumbnail On Profile, Search, Category, - and Others (fix to Feedback 4b)
- Changed File Path For Sending Emails in Upload Function (fix to Feedback 5a)
- Fixed Database Error When Adding New Messages to Dashboards (fix to Issue 5:4)
- Fixed Profile Image Upload Bug When Signing Up (fix to Issue 5:5)
- Overhauled "Textareas" (fix to Issue 5:6)
- Fixed Following Bug (POSSIBLE fix to Issue 5:7)
- Fixed Watch Later Bug (fix to Issue 5:8)
- Changed Error Handler for Watch Later List When Failed To Load
- Implemented Manual Initialize Watch Later List if Failed (fix to Issue 5:8)
- Implemented a Session Checker (Possible Solution to Issue 5:7 | Issue 5:8)
- Added "Delete Account" Button in Account Settings
- CSS Code File Overhaul
- Completed Responsive Design
- Installed Composer Updates
- Installed Newest Version of AWS SDK

## [v1.0b4](https://github.com/DevLexicon/OpusVid/releases/tag/v1.0b4) (Nov 8, 2018)
- Changed the allowed extensions for video to mp4 or m4v formats. (See Issue 3:3)
- New Page: Known Issues
- Follower Feed | Home Feed
- Feedback Form and Results
- Fixed Opus Collections: Now fully functioning (See Sucesses 4:1)
- Revamped Player Controls
  - New Fullscreen Function: CSS based
  - Controls are now displayed when hovered: Allowing for larger video
- Added Dashboard Stats (Video | Profile Views)
- Initial Dashboard Messages Implementation
- Watch Later List

## [v1.0b3](https://github.com/DevLexicon/OpusVid/releases/tag/v1.0b3) (Oct 25, 2018)
- Re-configured the Login Code
- Initial View and Functionality for Collections (see Issue 2)
- Password Reset Function
- Began Email Notifications:
   - New User Signup
   - Account Settings
   - Profile Update
   - Uploading Video
   - More to Come!
- Configuring DigitalOcean Spaces (see fix to Issue 1:6 | 1)
- Fixed Upload Function (see fix to Issue 1:4)
- Reconfigured the Avatar Upload Function
- "Floating Labels": Implementation
- Further Follow Function Implementation (NEARING COMPLETION)
- Added "*" to the Required Fields Within Forms (except for the Login Form)
- Initial Responsive Design Implementation
- Fixed Some Loop Issues Within Opus Collections
- Initial Implementing Comments To What a PHP file does!
- Updated Sitemap: A little more user friendly!

## [v1.0b2](https://github.com/DevLexicon/OpusVid/releases/tag/v1.0b2) (Oct 11, 2018)
- Initial HTML Validation
- Fixed Header
   - Fixed Links (now working for created pages)
   - Created "Account" Dropdown
   - Styled a bit of the links
- Initial Cleaned up some PHP
- Created profile settings (with avatar upload/update)
- Created Error Handlers:
   - Signup and Login
   - Video Deleting
   - Video Edited
- Created Video and Profile Search function
- Created Profile pages
- View (Video and Profile) Counts
- Initial Account Settings
- Implemented Dynamic Page Titles
- Created Categories Page
- Created Category page
- Paginated Home and Category Feeds
- Introduced "Private" Videos
- Admin Area:
   - All Video Manager and Editor
   - All Account Management
- Introduced New Roles:
   - 0 - Administrator
   - 1 - Moderator
   - 2 - DEFULT User
- Refined Video Player
- Refined Video and Profile Avatar Uploader
- When delete a video video and thumbnail paths will be deleted as well
- Base Follow Function
- Base "Add" Playlist Function
- Re-configured the signup code to make it more secure and more modern. Will be updating all other SQL code for the next update!

## [v1.0b1](https://github.com/DevLexicon/OpusVid/releases/tag/v1.0b1) (Sep 26, 2018)
Initial beta for version 1.0.
