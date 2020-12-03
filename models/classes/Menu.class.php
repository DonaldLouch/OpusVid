<?php
    class Menu extends MySQL {
        public function menuLevel1NoLogin() {
            $stmt = $this->connect()->query('SELECT * FROM menu WHERE userAccess = "notLogin" ORDER BY menuPlacement ASC');

            while($row = $stmt->fetch()) {
                if ($row['parentItem'] == 1) {
                    echo "<div class=\"dropdown\">";
                        echo "<a href=\"".$row['menuSlug']."\" class\"dropButton\">".$row['menuTitle']."</a>";
                        echo "<div class=\"dropdownContent\">";
                            $parentID = $row['menuPlacement'];
                            $newStmt = $this->connect()->prepare('SELECT * FROM sub_menu WHERE parentMenu=? AND subAccess = "notLogin" ORDER BY subPlacement ASC');
                            $newStmt->execute([$parentID]);
                            if ($newStmt->rowCount()) {
                                while ($subRow = $newStmt->fetch()) {
                                    //URI Searh
                                     if (strpos($subRow['subSlug'], 'TheOpusCreator') !== false) {
                                         echo "<a href=\"". str_replace("TheOpusCreator", $_SESSION['userName'], $subRow['subSlug'])."\">";
                                    } else {
                                        echo "<a href=\"".$subRow['subSlug']."\">";
                                    }
                                    //Title Search
                                    if (strpos($subRow['subTitle'], 'TheOpusCreator') !== false) {
                                        echo $_SESSION['userName'];
                                    } else {
                                        echo $subRow['subTitle']; 
                                    }
                                    echo "</a>";
                                }
                            }
                        echo "</div>";
                    echo "</div>";
                } elseif ($row['parentItem'] == 0) {
                    echo "<a href=\"".$row['menuSlug']."\">".$row['menuTitle']."</a>";
                }
            }
        }

        public function menuLevel1Login() {
            $stmt = $this->connect()->query('SELECT * FROM menu WHERE userAccess = "login" OR userAccess = "notLogin" ORDER BY menuPlacement ASC');

            while($row = $stmt->fetch()) {
                if ($row['parentItem'] == 1) {
                    echo "<div class=\"dropdown\">";
                        echo "<a href=\"".$row['menuSlug']."\" class\"dropButton\">".$row['menuTitle']."</a>";
                        echo "<div class=\"dropdownContent\">";
                            $parentID = $row['menuPlacement'];
                            $newStmt = $this->connect()->prepare('SELECT * FROM sub_menu WHERE parentMenu=? AND subAccess = "login" OR subAccess = "notLogin" ORDER BY subPlacement ASC');
                            $newStmt->execute([$parentID]);
                            if ($newStmt->rowCount()) {
                                while ($subRow = $newStmt->fetch()) {
                                    //URI Searh
                                     if (strpos($subRow['subSlug'], 'TheOpusCreator') !== false) {
                                         echo "<a href=\"". str_replace("TheOpusCreator", $_SESSION['userName'], $subRow['subSlug'])."\">";
                                    } else {
                                        echo "<a href=\"".$subRow['subSlug']."\">";
                                    }
                                    //Title Search
                                    if (strpos($subRow['subTitle'], 'TheOpusCreator') !== false) {
                                        echo $_SESSION['userName'];
                                    } else {
                                        echo $subRow['subTitle']; 
                                    }
                                    echo "</a>";
                                }
                            }
                        echo "</div>";
                    echo "</div>";
                } elseif ($row['parentItem'] == 0) {
                    echo "<a href=\"".$row['menuSlug']."\">".$row['menuTitle']."</a>";
                }
            }
        }

        public function menuLevel2NoLogin() {
            $stmt = $this->connect()->query('SELECT * FROM menu WHERE userAccess = "notLogin" ORDER BY menuPlacement ASC');

            while($row = $stmt->fetch()) {
                if ($row['parentItem'] == 1) {
                    echo "<div class=\"dropdown\">";
                        echo "<a href=\"../".$row['menuSlug']."\" class\"dropButton\">".$row['menuTitle']."</a>";
                        echo "<div class=\"dropdownContent\">";
                            $parentID = $row['menuPlacement'];
                            $newStmt = $this->connect()->prepare('SELECT * FROM sub_menu WHERE parentMenu=? AND subAccess = "notLogin" ORDER BY subPlacement ASC');
                            $newStmt->execute([$parentID]);
                            if ($newStmt->rowCount()) {
                                while ($subRow = $newStmt->fetch()) {
                                   //URI Searh
                                     if (strpos($subRow['subSlug'], 'TheOpusCreator') !== false) {
                                         echo "<a href=\"../". str_replace("TheOpusCreator", $_SESSION['userName'], $subRow['subSlug'])."\">";
                                    } else {
                                        echo "<a href=\"../".$subRow['subSlug']."\">";
                                    }
                                    //Title Search
                                    if (strpos($subRow['subTitle'], 'TheOpusCreator') !== false) {
                                        echo $_SESSION['userName'];
                                    } else {
                                        echo $subRow['subTitle']; 
                                    }
                                    echo "</a>";
                                }
                            }
                        echo "</div>";
                    echo "</div>";
                } elseif ($row['parentItem'] == 0) {
                    echo "<a href=\"../".$row['menuSlug']."\">".$row['menuTitle']."</a>";
                }
            }
        }

        public function menuLevel2Login() {
            $stmt = $this->connect()->query('SELECT * FROM menu WHERE userAccess = "login" OR userAccess = "notLogin" ORDER BY menuPlacement ASC');

            while($row = $stmt->fetch()) {
                if ($row['parentItem'] == 1) {
                    echo "<div class=\"dropdown\">";
                        echo "<a href=\"../".$row['menuSlug']."\" class\"dropButton\">".$row['menuTitle']."</a>";
                        echo "<div class=\"dropdownContent\">";
                            $parentID = $row['menuPlacement'];
                            $newStmt = $this->connect()->prepare('SELECT * FROM sub_menu WHERE parentMenu=? AND subAccess = "login" OR subAccess = "notLogin" ORDER BY subPlacement ASC');
                            $newStmt->execute([$parentID]);
                            if ($newStmt->rowCount()) {
                                while ($subRow = $newStmt->fetch()) {
                                   //URI Searh
                                     if (strpos($subRow['subSlug'], 'TheOpusCreator') !== false) {
                                         echo "<a href=\"../". str_replace("TheOpusCreator", $_SESSION['userName'], $subRow['subSlug'])."\">";
                                    } else {
                                        echo "<a href=\"../".$subRow['subSlug']."\">";
                                    }
                                    //Title Search
                                    if (strpos($subRow['subTitle'], 'TheOpusCreator') !== false) {
                                        echo $_SESSION['userName'];
                                    } else {
                                        echo $subRow['subTitle']; 
                                    }
                                    echo "</a>";
                                }
                            }
                        echo "</div>";
                    echo "</div>";
                } elseif ($row['parentItem'] == 0) {
                    echo "<a href=\"../".$row['menuSlug']."\">".$row['menuTitle']."</a>";
                }
            }
        }
    }
?>