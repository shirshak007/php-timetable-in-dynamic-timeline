<h3>CLASS ROUTINE</h3>

<?php
	$start = "11:00 PM";
	$end   = "1:00 AM";  
	
	/**
	 * Getting very start slot-time of a routine 
	 * Getting very end slot-time of a routine
	 */
	$timetable_schedule = getRoutine();
	foreach ($timetable_schedule as $day) {
	    foreach ($day as $times) { 
	        if(strtotime($times[0]['end_time']) > strtotime($end)) {
	            $end = $times[0]['end_time'];
	        }
	        if(strtotime($times[0]['start_time']) < strtotime($start)) {
	            $start = $times[0]['start_time'];
	        }
	    }
	    
	}
	
	//Calculating total width of a class-routine
    $datetime1 = new DateTime($start);
    $datetime2 = new DateTime($end);
    $interval = $datetime1->diff($datetime2);
    $diff = explode(" ", $interval->format('%h %i'));
    $total = $diff[0]*60 + $diff[1];

	$d = 0; //dow starting from 0
	foreach ($timetable_schedule as $day) {?>
		<!-- EACH ROW -->
		<div class="daywidth" style="display: grid; grid-template-columns: <?php for($cc = 0 ; $cc < $total*4; $cc++){echo "1px ";}?>;margin-bottom:6px;background:rgba(210, 214, 214, .5)">
		<!-- EACH DAY NAME -->
		<div style="width:40px; border:1px solid gray;display:flex; flex-direction:column; align-items:center; justify-content:center"><b> <?php echo getDayName($d+1)?> </b></div>
		<?php
        $m = 0;
        foreach ($day as $times) {
            //EACH SLOT
            $slotStart = $times[0]['start_time'];
            $slotEnd = $times[0]['end_time'];
            
            $datetime1 = new DateTime($start);
            $datetime2 = new DateTime($slotStart);
            $interval = $datetime1->diff($datetime2);
            $diff = explode(" ", $interval->format('%h %i'));
            $left = $diff[0]*60 + $diff[1];
            
            $datetime1 = new DateTime($slotStart);
            $datetime2 = new DateTime($slotEnd);
            $interval = $datetime1->diff($datetime2);
            $diff = explode(" ", $interval->format('%h %i'));
            $width = $diff[0]*60 + $diff[1];
            ?>
            <!-- EACH SLOT WITH DYNAMIC WIDTH AND POSITION -->
            <div style="margin-left:40px;grid-column-start: <?php echo $left*4;?>;width:<?php echo $width*4?>px;border:1px solid #b6cfd1;background:white">
            <?php 
            foreach ($times as $slot) {
                //EACH SLOT MAY HAVE MULTIPLE COMBINED CLASSES
                echo '<b>' . $slot['start_time'] . ' - ' . $slot['end_time'] . "</b><br>";
                echo $slot['course_name'] . "<br>";
                echo ! empty($slot['teacher_name']) ? $slot['teacher_name'] .$slot['daterange']."<br>" : '-' . "<br>";
                ?>
                <hr style="margin:1px;">
                <?php 
            }
        ?>
        </div>
        <?php
        $m ++;
        }
        ?>
	</div>
<?php 
$d++;
}?>


<?php 
// GET The class routine in array format like this
function getRoutine()
{
    return array(
        array(
            array(
                array(
                    "teacher_name" => "Champak Kumar Dutta",
                    "course_name" => "Enabling Technologies for Big Data Computing",
                    "start_time" => "10:30 AM",
                    "end_time" => "11:30 AM"
                )
            ),
            array(
                array(
                    "teacher_name" => "Shirshak Das",
                    "course_name" => "Approximation and Online algorithms",
                    "start_time" => "12:30 PM",
                    "end_time" => "1:30 PM"
                )
            ),
            array(
                array(
                    "teacher_name" => "Shirshak Das",
                    "course_name" => "Second Course in Algorithms",
                    "start_time" => "2:30 PM",
                    "end_time" => "4:30 PM"
                )
            )
        ),
        array(
            array(
                array(
                    "teacher_name" => "Shirshak Das",
                    "course_name" => "Oracle for DBA",
                    "start_time" => "8:00 AM",
                    "end_time" => "10:00 AM"
                )
            ),
            array(
                array(
                    "teacher_name" => "Shirshak Das",
                    "course_name" => "Machine Learning",
                    "start_time" => "12:30 PM",
                    "end_time" => "1:30 PM"
                )
            )
        ),
        array(
            array(
                array(
                    "teacher_name" => "Joydeep Mukherjee",
                    "course_name" => "Combinatorics",
                    "start_time" => "8:00 AM",
                    "end_time" => "10:00 AM"
                )
            ),
            array(
                array(
                    "teacher_name" => "Swami Sarvottamananda",
                    "course_name" => "Mathematical Logic",
                    "start_time" => "10:30 AM",
                    "end_time" => "12:30 PM"
                ),
                array(
                    "teacher_name" => "Brahmachari Mrinmay",
                    "course_name" => "Computational Data Science",
                    "start_time" => "10:30 AM",
                    "end_time" => "12:30 PM"
                )
            ),
            array(
                array(
                    "teacher_name" => "Shirshak Das",
                    "course_name" => "Approximation and Online algorithms",
                    "start_time" => "12:30 PM",
                    "end_time" => "1:30 PM"
                )
            ),
            array(
                array(
                    "teacher_name" => "Shirshak Das",
                    "course_name" => "Second Course in Algorithms",
                    "start_time" => "2:30 PM",
                    "end_time" => "4:30 PM"
                )
            )
        ),
        array(
            array(
                array(
                    "teacher_name" => "Joydeep Mukherjee",
                    "course_name" => "Combinatorics",
                    "start_time" => "8:00 AM",
                    "end_time" => "10:00 AM"
                )
            ),
            array(
                array(
                    "teacher_name" => "Champak Kumar Dutta",
                    "course_name" => "Enabling Technologies for Big Data Computing",
                    "start_time" => "10:30 AM",
                    "end_time" => "12:30 PM"
                ),
                array(
                    "teacher_name" => "Swami Sarvottamananda",
                    "course_name" => "Mathematical Logic",
                    "start_time" => "10:30 AM",
                    "end_time" => "12:30 PM"
                ),
                array(
                    "teacher_name" => "Shirshak Das",
                    "course_name" => "Machine Learning",
                    "start_time" => "10:30 AM",
                    "end_time" => "12:30 PM"
                )
            ),
            array(
                array(
                    "teacher_name" => "Swami Shastravidyananda",
                    "course_name" => "Automata Theory",
                    "start_time" => "1:00 PM",
                    "end_time" => "2:00 PM"
                )
            )
        ),
        array(
            array(
                array(
                    "teacher_name" => "Swami Sarvottamananda",
                    "course_name" => "Mathematical Logic",
                    "start_time" => "10:30 AM",
                    "end_time" => "12:30 PM"
                )
            ),
            array(
                array(
                    "teacher_name" => "Janardan Ghosh",
                    "course_name" => "Communicative English",
                    "start_time" => "12:30 PM",
                    "end_time" => "1:30 PM"
                )
            ),
            array(
                array(
                    "teacher_name" => "Avishek Mondal",
                    "course_name" => "Automata Theory",
                    "start_time" => "2:30 PM",
                    "end_time" => "4:30 PM"
                )
            )
        ),
        array(),
        array()
    );
}

function getDayName($day)
{
    if ($day == 1) {
        return "Mon";
    } elseif ($day == 2) {
        return "Tue";
    } elseif ($day == 3) {
        return "Wed";
    } elseif ($day == 4) {
        return "Thu";
    } elseif ($day == 5) {
        return "Fri";
    } elseif ($day == 6) {
        return "Sat";
    } elseif ($day == 7) {
        return "Sun";
    } else {
        return "";
    }
}
?>

