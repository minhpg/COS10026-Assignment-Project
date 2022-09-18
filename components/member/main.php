<?php include('members/minhpg.php'); ?>
<section>
    <div class="card bg-base-100 shadow h-full">
        <div class="card-body">
            <div>
                <figure class="h-1/4 image-float-right">
                    <img src="<?php echo $image_url; ?>" alt="member" class="w-48 sm:w-48 md:w-64 lg:w-72 member-img" />
                </figure>
                <div class="w-full">
                    <h2 class="card-title text-2xl">
                        <?php echo $name ?>
                    </h2>
                    <h3 class="card-subtitle"> <?php echo $title ?>
                    </h3>
                </div>
                <div class="font-light mt-5">
                    <ul>
                        <li><b>Student ID: </b> <?php echo $student_id ?>
                        </li>
                        <li><b>Course: </b>Bachelor of <?php echo $course ?>
                        </li>
                        <li><b>Email: </b><a href="mailto:<?php echo $student_id ?>@student.swin.edu.au"><?php echo $student_id ?>@student.swin.edu.au</a></li>
                        <li><b>Phone number: </b><a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a></li>
                    </ul>
                </div>
                <div class="mt-5 font-light">
                <?php echo $description ?>
                </div>
            </div>
        </div>
    </div>

</section>
<div class="bg-base-100 shadow my-5 rounded-box p-4 overflow-x-scroll">
    <?php require('timetable.php') ?>
</div>