<?php
$userName = $_SESSION['user']['name'] ;
$userEmail = $_SESSION['user']['email'] ;
?>

<form action="index.php?page=contact_controller" method="POST">
    <div class="row">
        <div class="col-lg-6">
            <div class="single-acc-field">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($userName) ?>" readonly>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="single-acc-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($userEmail) ?>" readonly>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="single-acc-field">
                <label for="msg">Message</label>
                <textarea name="msg" id="msg" rows="4" required></textarea>
            </div>
        </div>
    </div>

    <div class="single-acc-field">
        <button type="submit">Send Message</button>
    </div>
</form>