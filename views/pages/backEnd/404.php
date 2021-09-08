<?php require '../../blades/head.php'; ?>

<body>
    <script>
    document.title = "404 Not Found | <?php echo $websiteName; ?>"
    </script>
    <main>
        <div class="fullscreen errorPage">
            <section class="card intro">
                <h1 style="color: var(--tertiaryColour); text-decoration: underline var(--blackColour);">It seems
                    there's been an error while loading this page.</h1>
                <p style="text-align: center; font-size: 1.2rem; margin: 1rem 0;">It could be an invaild/mistyped URL or
                    the page faild
                    to load resources. Please try again or go to the home page; search for a video or profile; or view
                    the sitemap to navagaite to right place! You can also</p>
                <p class="buttonWrap" id="errorButtonWrap">
                    <a href="javascript:history.back();" class="submitButton errorHome">Go To The Last Page</a>
                    <a href="../" class="submitButton errorHome">Go To The Home Page</a>
                </p>
                <p style="text-align: center;">--- OR ---</p>
                <br>
                <nav class="errorNav">
                    <div id="links" class="links">
                        <?php 
						$menuClass = new Menu;
						echo $menuClass->menuLevel1NoLogin();
					?>
                    </div>
                </nav>
                <br>
                <p style="text-align: center;">--- OR ---</p>
                <form action="../search" method="post" id="searchForm">
                    <input type="search" name="search" placeholder="Search">
                    <label>
                        <input type="submit" name="submit" style="display:none;" />
                        <?php echo file_get_contents($baseFileURL."/ui/searchVector.svg"); ?>
                    </label>
                </form>
            </section>
        </div>
    </main>
</body>

</html>