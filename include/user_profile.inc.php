

<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
            <form method="POST" action="">
            <img src="data:image/png;base64, <?= $r['user_photo'] ?>" width=250 height=250>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input class="form-control" name="email" placeholder="Enter email"  value="<?= $r['user_email'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?= $r['user_name'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input class="form-control" name="address" placeholder="Address"  value="<?= $r['user_address'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">date of birth</label>
                    <input class="form-control" type="date" name="birthday" placeholder="Date of birth"  value="<?= $r['user_birthday'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input class="form-control" name="city" placeholder="City"  value="<?= $r['user_city'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">phone number</label>
                    <input class="form-control" name="phone" placeholder="phone number" value="<?= $r['user_phone_number'] ?>" readonly>
                </div>
            </form>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>