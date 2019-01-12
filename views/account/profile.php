<div class="full">
    <div class="profile">
        <h3 class="long-head-name">Profile</h3>
        <div class="profile-container">
            <form class="profile-info">
                <div class="form-group row">
                    <label for="staticName" class="col-sm-3 col-form-label">Your name:</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticName" value="<?=$_SESSION["name"]?>">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticSurname" class="col-sm-3 col-form-label">Your surname:</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext" id="staticSurname" value="<?=$_SESSION["surname"]?>">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticBirthday" class="col-sm-3 col-form-label">Birthday:</label>
                    <div class="col-sm-9">
                        <input type="date" readonly class="form-control-plaintext" id="staticBirthday" value="<?=$_SESSION["birthday"]?>">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" readonly class="form-control-plaintext" id="staticEmail" value="<?=$_SESSION["user_email"]?>">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticPhone" class="col-sm-3 col-form-label">Phone:</label>
                    <div class="col-sm-9">
                        <input type="number" readonly class="form-control-plaintext" id="staticPhone" value="<?=$_SESSION["phone"]?>">
                    </div>
                </div>
            </form>
            <div class="profile-avatar">
                <img class="profile-image" src="<?=$_SESSION["user_avatar"]?>"/>
                <hr>
                <form class="form-change" method="POST" id="profile_form_change" enctype="multipart/form-data">
                    <input class="invisible" id="input_change_file" type="file" name="user_avatar" />
                    <lable class="btn btn-warning" id="lable_change">Take the ava</lable> <hr>
                    <button class="btn btn-primary" id="submit_form" type="submit">Save change</button>
                </form>
                <a class="btn btn-primary" id="profile_change">Change photo</a>
            </div>
        </div>
    </div>
</div>
