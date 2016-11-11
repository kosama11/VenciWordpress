<?php
global $wpdb;
//Active Game
if (isset($_POST['active'])) {
    $wpdb->query("INSERT INTO `wp_wheel_game`
          (`firstname`,`lastname`,`tel`,`email`,`ipaddress`,`reward`) 
   values ('active', 'active', 0000, 'active', 'active', 'active')");

    $wpdb->query("CREATE TABLE wp_config_wheel_game (
        id BIGINT NOT NULL AUTO_INCREMENT,
    	onoff VARCHAR(20) NOT NULL,
        fromDate VARCHAR(20) NOT NULL,
        toDate VARCHAR(20) NOT NULL,
    	PRIMARY KEY(id)
    )");
}

//Check Active
$checkQuery = "SELECT `firstname` FROM `wp_wheel_game` WHERE `firstname`='active'";
$checkActive = $wpdb->query($checkQuery);

//On/Off Game and set start and end date
if (isset($_POST['submit']) == "submit"){
    $onoffGame = $_POST['checked'];
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    //check database available >= date of today
    $getFromDateQuery = "SELECT `fromDate` FROM wp_config_wheel_game";
    $getFromDateResult = $wpdb->get_results($getToDateQuery, ARRAY_N);
    $getToDateQuery = "SELECT `toDate` FROM wp_config_wheel_game";
    $getToDateResult = $wpdb->get_results($getToDateQuery, ARRAY_N);
    $countFromDate = count($getFromDateResult);
    $countToDate = count($getToDateResult);
    $dateNow = date("Y-m-d");
    $resultOnOff = '';
    if ($fromDate == '' || $toDate == ''){
        $resultOnOff = '<span class="errorWheel">Моля изберете начална и крайна дата!</span>';
    }
    elseif ($onoffGame == 'on'){
        for ($i = 0; $i < $countToDate; $i++){
            if ($dateNow <= $getToDateResult[$i][0]){
                $resultOnOff = 'true';
                if ($resultOnOff == 'true'){
                    $resultOnOff = '<span class="errorWheel">Вече има активирана промоция!</span>';
                    break;
                }
                }
                else{
                if ($fromDate < $dateNow){
                    $resultOnOff = '<span class="errorWheel">Не може да пускате промоция от миналото!</span>';
                }
                elseif($fromDate >= $toDate){
                    $resultOnOff = '<span class="errorWheel">Опитвате се да пуснете промоция ДО миналото!</span>';
                }
                else{
                    $resultOnOff = '<span class="successfullyWheel">Промоцията Ви е създадена успешно!</span>';
                }
            }
            }
        }



    }
if ($checkActive == 0){
?>
    <div id="activate">
        <div>
            За да продължите напред, трябва да активирата играта!
            <form method="post" id="active-form">
                <input type="submit" name="active" value="Активирай"/>
            </form>
        </div>
    </div>
<?php
    }
else{
?>
    <div id="on-off">
        <form method="post">
            <!--<div id="onoff-game">
                <p>Статус на играта: </p>
                <div>
                    <label class="switch">
                                <input class="checkbox-slider" type="checkbox">
                          <div class="slider round"></div>
                    </label>
                </div>
            </div>-->
            <div id="period-game">
                <p>Създаване на промоция:</p>
                <div>
                    <span>От дата: <input type="date" name="fromDate" value="<?php echo date("Y-m-d"); ?>"></span>
                    <span>До дата: <input type="date" name="toDate" value="mm/dd/yyyy"></span>
                </div>
            </div>
            <div id="submit-game">
                <p><?php echo $resultOnOff; ?></p>
                <div>
                    <input type="hidden" name="submit" value="submit">
                    <input type="hidden" name="checked" value="on">
                    <input class="submit-button-wheel" type="submit" value="Запази">
                </div>
            </div>
        </form>
    </div>
    <div id="edit-reward">
        <form method="post">
            <div id="onoff-game">
                <p>Включване/Изключване на играта:</p>
                <div>
                    <label class="switch">
                                <input class="checkbox-slider" type="checkbox" name="onoff">
                          <div class="slider round"></div>
                    </label>
                </div>
            </div>
            <div id="period-game">
                <p>Период на промоцията:</p>
                <div>
                    <span>От дата: <input type="date" name="from" value="<?php echo date("Y-m-d"); ?>"></span>
                    <span>До дата: <input type="date" name="to" value="mm/dd/yyyy"></span>
                </div>
            </div>
            <div id="submit-game">
                    <input class="submit-button-wheel" type="submit" value="Запази">
            </div>
        </form>
    </div>
<?php
}
?>