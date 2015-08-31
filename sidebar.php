        <?php
        if($edit){
        echo '        <nav id="sidebarcollaps" class="navmenu navmenu-inverse navmenu-fixed-left offcanvas canvas-slid ">
            <a id="closesidebar" class="close" >×</a>
            <a class="navmenu-brand">Filter</a>
            <button id="clearfilters" type="button" class="btn btn-default  btn-xs">Clear Filters</button>
            <div id="checkboxes">

                <p>Starting Items</p>
                <ul>
                    <li><input id="filter" value="Jungle" type="checkbox"> Jungle</li>
                    <li><input id="filter" value="Lane" type="checkbox"> Lane</li>
                </ul>

                <p>Tools</p>
                <ul>
                    <li><input id="filter" value="Consumable" type="checkbox"> Consumable</li>
                    <li><input id="filter" value="GoldPer" type="checkbox"> Gold Income</li>
                    <li><input id="filter" value="Vision" type="checkbox"> Vision</li>
                </ul>


                <p>Defense</p>
                <ul>
                    <li><input id="filter" value="Armor" type="checkbox"> Armor</li>
                    <li><input id="filter" value="Health" type="checkbox"> Health</li>
                    <li><input id="filter" value="HealthRegen" type="checkbox"> Health Regen</li>
                    <li><input id="filter" value="SpellBlock" type="checkbox"> Magic Resist</li>
                </ul>                   

                <p>Attack</p>
                <ul>
                    <li><input id="filter" value="AttackSpeed" type="checkbox"> Attack Speed</li>
                    <li><input id="filter" value="CriticalStrike" type="checkbox"> Critical Strike</li>
                    <li><input id="filter" value="Damage" type="checkbox"> Damage</li>
                    <li><input id="filter" value="LifeSteal" type="checkbox"> Life Steal</li>
                </ul>

                <p>Magic</p>
                <ul>
                    <li><input id="filter" value="CooldownReduction" type="checkbox"> Cooldown Reduction</li>
                    <li><input id="filter" value="Mana" type="checkbox"> Mana</li>
                    <li><input id="filter" value="SpellDamage" type="checkbox"> Ability Power</li>
                    <li><input id="filter" value="ManaRegen" type="checkbox"> Mana Regen</li>
                </ul>

                <p>Movement</p>
                <ul>
                    <li><input id="filter" value="Boots" type="checkbox"> Boots</li>
                    <li><input id="filter" value="NonbootsMovement" type="checkbox"> Other Movment</li>
                </ul>
            </div>
        </nav>
        <div id="sidebar">
            <div id="buttonsearch">
                <button id="bngroupbar" type="button" class="btn btn-default glyphicon glyphicon-menu-hamburger navbar-toggle" data-toggle="offcanvas" data-target="#sidebarcollaps" data-canvas="#wrapper"></button>
                <div id="search" class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                    <div class="input-group-btn ">
                        <button class="btn btn-default " type="submit"><i class="glyphicon glyphicon-search "></i></button>
                    </div>
                </div>
            </div>



            <ul id="buildbar">';
                        require_once 'itemlist.php';
            echo "</ul> </div>";
        }
            ?>

                                