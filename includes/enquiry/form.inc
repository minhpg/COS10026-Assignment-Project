<?php 
    include('form_validation.php');

    function renderAlertSuccess(){
        echo '<div class="alert alert-success shadow-lg my-5 max-w-none">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>Your enquiry has been recieved!</span>
        </div>
      </div>';
    }
    function renderAlertFailed(){
        echo '<div class="alert alert-error shadow-lg my-5 max-w-none">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>Please fill out all required fields!</span>
        </div>
      </div>';
    }
?>
<!-- START FORM -->
<div>
    <?php 
        if($submitted){
            if($enquiry_validated){
                renderAlertSuccess();
            }
            else {
                renderAlertFailed();
            }
        }
    ?>
</div>
<div class="rounded-box bg-base-200 my-5 p-5 md:p-8 lg:p-10 max-w-none">
    <h1 class="text-4xl font-black mb-1">We Would Love To Hear From You</h1>
    <p class="font-light">We always aim to provide a great experience and are here to help. Please use the form below to let us know what you love, and where we could improve.</p>
    <form class="mx-0 md:mx-20 mt-10 mb-5 font-light" method="post" novalidate="novalidate">
        <p>Does this feedback relate to a store?</p>
        <div class="flex gap-4 my-3">
            <div class="form-control">
                <label class="label cursor-pointer" for="storeRelated_true">
                    <span class="label-text mx-2">Yes</span>
                    <input type="radio" name="store_related" id="storeRelated_true" class="radio" value="true" />
                </label>
            </div>
            <div class="form-control">
                <label class="label cursor-pointer" for="storeRelated_false">
                    <span class="label-text mx-2">No</span>
                    <input type="radio" name="store_related" id="storeRelated_false" class="radio" value="false" checked />
                </label>
            </div>
        </div>
        <label for="nature">What is the nature of your feedback? <b class="text-red-600">*</b><br>
            <select name="nature_of_feedback" id="nature" class="my-3 select w-full font-light" required>
                <option selected disabled value>Select one</option>
                <option value="complaint">Complaint</option>
                <option value="compliment">Compliment</option>
                <option value="employment">Employment</option>
            </select>
        </label>
        <p>Reason</p>
        <div class="flex gap-4 my-3">
            <div class="form-control">
                <label class="label cursor-pointer">
                    <span class="label-text mx-2">Quality of Service</span>
                    <input type="checkbox" name="reason[]" class="checkbox" id="reason_qualityofservice" value="qualityofservice" checked />
                </label>
            </div>
            <div class="form-control">
                <label class="label cursor-pointer" for="reason_qualityofproduct">
                    <span class="label-text mx-2">Quality of Products</span>
                    <input type="checkbox" name="reason[]" class="checkbox" id="reason_qualityofproduct" value="qualityofproduct" />
                </label>
            </div>
            <div class="form-control">
                <label class="label cursor-pointer" for="reason_others">
                    <span class="label-text mx-2">Others</span>
                    <input type="checkbox" name="reason[]" class="checkbox" id="reason_others" value="others" />
                </label>
            </div>
        </div>

        <label for="visit-date">Date of Visit: <b class="text-red-600">*</b></label>
        <input type="date" name="visit_date" id="visit-date" autocomplete="off" class="my-3 input w-full" required>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" class="my-3 textarea w-full h-40" placeholder="Enter text here"></textarea>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label for="first-name">First name: <b class="text-red-600">*</b></label>
                <input type="text" name="first_name" id="first-name" maxlength="25" pattern="[a-zA-Z\s]*" placeholder="Enter first name" autocomplete="off" class="my-3 input w-full" required>
            </div>
            <div>
                <label for="last-name">Last name: <b class="text-red-600">*</b></label>
                <input type="text" name="last_name" id="last-name" maxlength="25" pattern="[a-zA-Z\s]*" placeholder="Enter last name" autocomplete="off" class="my-3 input w-full" required>
            </div>
        </div>
        <label for="mobile-number">Mobile Number: <b class="text-red-600">*</b></label>
        <input type="text" name="mobile_number" id="mobile-number" maxlength="10" pattern="\d{10}" placeholder="Enter mobile number" autocomplete="off" class="my-3 input w-full" required>
        <label for="email-address">Email Address: <b class="text-red-600">*</b></label>
        <input type="email" name="email" id="email-address" placeholder="Enter email address" autocomplete="off" class="my-3 input w-full" required>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-3">
            <div>
                <label for="street-address">Street address: <b class="text-red-600">*</b></label>
                <input type="text" name="street_address" id="street-address" maxlength="40" pattern="[0-9a-zA-Z\s]*" placeholder="Enter street address" autocomplete="off" class="my-3 input w-full" required>
            </div>
            <div>
                <label for="suburb">Suburb: <b class="text-red-600">*</b></label>
                <input type="text" name="suburb" id="suburb" maxlength="20" pattern="[a-zA-Z\s]*" placeholder="Enter suburb" autocomplete="off" class="my-3 input w-full" required>
            </div>
            <div>
                <label for="state">State: <b class="text-red-600">*</b></label>
                <select name="state" id="state" class="my-3 select w-full font-light" required>
                    <option selected disabled value>Select one</option>
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="NT">NT</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select>
            </div>
            <div>
                <label for="postcode">Postcode: <b class="text-red-600">*</b></label>
                <input type="text" name="postcode" id="postcode" maxlength="4" pattern="\d{4}" placeholder="Enter postcode" autocomplete="off" class="my-3 input w-full" required>
            </div>
        </div>
        <p>Prefered contact</p>
        <div class="flex gap-4 my-3">
            <div class="form-control">
                <label class="label cursor-pointer" for="contact_email">
                    <span class="label-text mx-2">Email</span>
                    <input type="radio" name="contact_method" id="contact_email" class="radio" value="email" checked />
                </label>
            </div>
            <div class="form-control">
                <label class="label cursor-pointer" for="contact_post">
                    <span class="label-text mx-2">Post</span>
                    <input type="radio" name="contact_method" id="contact_post" class="radio" value="post" />
                </label>
            </div>
            <div class="form-control">
                <label class="label cursor-pointer" for="contact_phone">
                    <span class="label-text mx-2">Phone</span>
                    <input type="radio" name="contact_method" id="contact_phone" class="radio" value="phone" />
                </label>
            </div>
        </div>
        <div class="flex justify-between w-full text-sm mb-4">
            <p>Required field.<b class="text-red-600">*</b></p>
            <p>We'll never share your details with anyone else.</p>
        </div>
        <label for="submit"></label>
        <input type="submit" id="submit" class="my-3 btn btn-ghost bg-red-600 text-white w-full lg:w-32" />
    </form>
</div>
<!-- END FORM -->