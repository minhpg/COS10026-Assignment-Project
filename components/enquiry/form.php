<div class="rounded-box bg-base-200 my-5 p-5 md:p-8 lg:p-10 max-w-none">
    <h1 class="text-4xl font-black mb-1">We Would Love To Hear From You</h1>
    <p class="font-light">We always aim to provide a great experience and are here to help. Please use the form below to let us know what you love, and where we could improve.</p>
    <form class="mx-0 md:mx-20 mt-10 mb-5 font-light" method="post" action="http://mercury.swin.edu.au/it000000/formtest.php">
        <label for="storeRelated">Does this feedback relate to a store?</label>
        <div class="flex gap-4 my-3">
            <div class="form-control">
                <label class="label cursor-pointer">
                    <span class="label-text mx-2">Yes</span>
                    <input type="radio" name="storeRelated" class="radio" value="true" />
                </label>
            </div>
            <div class="form-control">
                <label class="label cursor-pointer">
                    <span class="label-text mx-2">No</span>
                    <input type="radio" name="storeRelated" class="radio" value="false" checked />
                </label>
            </div>
        </div>
        <label for="nature">What is the nature of your feedback? <b class="text-red-600">*</b><br>
            <select name="nature" class="my-3 select w-full font-light" required>
                <option default value="unspecified">Unspecified</option>
                <option value="complaint">Complaint</option>
                <option value="compliment">Compliment</option>
                <option value="employment">Employment</option>
            </select>
            <label for="reason">Reason</label>
            <div class="flex gap-4 my-3">
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text mx-2">Quality of Service</span>
                        <input type="checkbox" name="reason_qualityofservice" class="checkbox" value="qualityofservice" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text mx-2">Quality of Products</span>
                        <input type="checkbox" name="reason_qualityofproduct" class="checkbox" value="qualityofproduct" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text mx-2">Others</span>
                        <input type="checkbox" name="reason_others" class="checkbox" value="others" />
                    </label>
                </div>
            </div>

            <label for="visitDate">Date of Visit: <b class="text-red-600">*</b></label>
            <input type="date" name="visitDate" id="visit-date" placeholder="Choose date" autocomplete="off" class="my-3 input w-full" required>
            <label for="comment">Comment:</label>
            <textarea name="comment" class="my-3 textarea w-full h-40" placeholder="Enter text here"></textarea>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <label for="firstName">First name: <b class="text-red-600">*</b></label>
                    <input type="text" name="firstName" id="first-name" maxlength="25" pattern="[a-zA-Z\s]*" placeholder="Enter first name" autocomplete="off" class="my-3 input w-full" required>
                </div>
                <div>
                    <label for="lastName">Last name: <b class="text-red-600">*</b></label>
                    <input type="text" name="lastName" id="last-name" maxlength="25" pattern="[a-zA-Z\s]*" placeholder="Enter last name" autocomplete="off" class="my-3 input w-full" required>
                </div>
            </div>
            <label for="mobileNumber">Mobile Number: <b class="text-red-600">*</b></label>
            <input type="text" name="mobileNumber" id="mobile-number" maxlength="10" pattern="\d{10}" placeholder="Enter mobile number" autocomplete="off" class="my-3 input w-full">
            <label for="emailAddress">Email Address: <b class="text-red-600">*</b></label>
            <input type="email" name="email" id="email" placeholder="Enter email address" autocomplete="off" class="my-3 input w-full" required>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-3">
                <div>
                    <label for="streetAddress">Street address: <b class="text-red-600">*</b></label>
                    <input type="text" name="streetAddress" id="street-address" maxlength="40" pattern="[0-9a-zA-Z\s]*" placeholder="Enter street address" autocomplete="off" class="my-3 input w-full" required>
                </div>
                <div>
                    <label for="suburb">Suburb: <b class="text-red-600">*</b></label>
                    <input type="text" name="suburb" id="suburb" maxlength="20" pattern="[a-zA-Z\s]*" placeholder="Enter suburb" autocomplete="off" class="my-3 input w-full" required>
                </div>
                <div>
                    <label for="state">State: <b class="text-red-600">*</b></label>
                    <select name="state" class="my-3 select w-full font-light" required>
                        <option value="VIC" default>VIC</option>
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
            <label for="contactMethod">Prefered contact</label>
            <div class="flex gap-4 my-3">
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text mx-2">Email</span>
                        <input type="radio" name="contactMethod" class="radio" value="email" checked />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text mx-2">Post</span>
                        <input type="radio" name="contactMethod" class="radio" value="post" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text mx-2">Phone</span>
                        <input type="radio" name="contactMethod" class="radio" value="phone" />
                    </label>
                </div>
            </div>
            <div class="flex justify-between w-full text-sm mb-4">
                <p> Required field.<b class="text-red-600">*</b></p>
                <p>We'll never share your details with anyone else.</p>
            </div>
            <input type="submit" class="my-3 btn btn-ghost bg-red-600 text-white w-full lg:w-32"></input>
    </form>

</div>