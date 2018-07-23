<!doctype html>
<html lang="en">
<head>
    <meta charset="windows-1251"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../template/css/style.css">
    <link rel="stylesheet" href="../../template/css/chosen.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script type="text/javascript" src="../template/js/validations.js"></script>
    <title></title>
</head>

<body>
<div class="formDiv">
    <form action=" " method="post" id="registration" class="validationSingupform">
        <ul class="formUl">
            <li>
                <label class="mainLabel" for="login">Login</label>
                <input type="text" name="login" id="login" class="login requiredField" placeholder="login">
            </li>
            <li>
                <label class="mainLabel" for="email">E-mail</label>
                <input type="email" name="email" id="email" class="email requiredField" placeholder="email@gmail.com">
            </li>
            <li>
                <label class="mainLabel" for="region">Region</label>
                <select name="region" id="region" class="region requiredField">
                    <option value="0">Select region</option>
                    <?php foreach ($listRegion as $rowregion) {
                        echo "<option value = '" . $rowregion['ter_id'] . "'>" . $rowregion['ter_name'] . "</option>";
                    } ?>
                </select>
            </li>
            <li>
                <label class="mainLabel" for="city">City</label>
                <select name="city" id="city" class="city requiredField">
                    <option value="0">Select city</option>
                    <?php foreach ($listCity as $rowcity) {
                        echo "<option value = '" . $rowcity['ter_pid'] . "'>" . $rowcity['ter_name'] . "</option>";
                    } ?>
                </select>
            </li>
            <li>
                <label class="mainLabel" for="district">District</label>
                <select name="district" id="district" class="district requiredField">
                    <option value="0">Select district</option>
                </select>
            </li>
            <li>
                <input type="submit" name="signUp" id="signUp">
            </li>
        </ul>

    </form>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $(".region").change(function () {

            var menuId = $(this).val();
            console.log(menuId);

            var request = $.ajax({
                url: "searchCity",
                method: "POST",
                data: {id: menuId},
                dataType: "html"
            });

            request.done(function (msg) {
                $(".city").find('option')
                    .remove()
                    .end()
                    .append(msg);
                console.log(msg);
            });

            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });

        });
    });
    $(document).ready(function () {
        $(".city").change(function () {

            var menuId = $(".region").val();
            console.log(menuId);

            var request = $.ajax({
                url: "searchDistrict",
                method: "POST",
                data: {id: menuId},
                dataType: "html"
            });

            request.done(function (msg) {
                $(".district").find('option')
                    .remove()
                    .end()
                    .append(msg);
                console.log(msg);
            });
            request.fail(function (jqXHR, textStatus) {
                alert("Request failed: " + textStatus);
            });

        });
    });
</script>
</html>
