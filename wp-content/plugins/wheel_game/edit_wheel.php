<?php
global $wpdb;
//Active Game
if (isset($_POST['active'])) {
    $wpdb->query("INSERT INTO `wp_wheel_game`
          (`firstname`,`lastname`,`tel`,`email`,`ipaddress`,`reward`) 
   values ('active', 'active', 0000, 'active', 'active', 'active')");
}


//Check Active
$checkQuery = "SELECT `firstname` FROM `wp_wheel_game` WHERE `firstname`='active'";
$checkActive = $wpdb->query($checkQuery);

if ($checkActive == 0){
    $result = '<div>За да продължите напред, трябва да активирата играта! <form method="post" id="active-form"><input type="submit" name="active" value="Активирай"/></form></div>';
}
else{


?>
    <div id="activate">
        <?php echo $result ?>
    </div>

    <div id="on-off">

        <form method="post">
            <div>
                <span class="span-wheel">Включване/Изключване на играта:</span>
                    <label class="switch">
                                <input class="checkbox-slider" type="checkbox" name="onoff">
                          <div class="slider round"></div>
                    </label>
            </div>
            <div>
                <span class="span-wheel">Период на промоцията:</span>
                <span>От:</span><input type="datetime-local" name="ondate">
            </div>
        </form>
    </div>
<?php
}
?>