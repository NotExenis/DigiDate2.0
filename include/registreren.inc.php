<div class="registration">
    <h1>registratie user</h1>
    <form action="php/registreren.php" method="post" enctype="multipart/form-data">
        <label for="firstname">Voornaam *</label>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="lastname">Achternaam</label>
        <input type="text" id="lastname" name="lastname"><br><br>

        <label for="email">E-mail *</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Wachtwoord *</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="gender">Man/Vrouw *</label>
        <select id="gender" name="gender" required>
            <option value="man">Man</option>
            <option value="vrouw">Vrouw</option>
            <option value="other">other</option>
        </select><br><br>

        <label for="weight">Gewicht</label>
        <input type="number" id="weight" name="weight"><br><br>

        <label for="height">Lengte</label>
        <input type="number" id="height" name="height"><br><br>

        <label for="tags">Tags</label>
        <input type="text" id="tags" name="tags"><br><br>

        <label for="location">Woonplaats *</label>
        <input type="text" id="location" name="location" required><br><br>

        <label for="photo">Foto</label>
        <input type="file" id="photo" name="photo"><br><br>

        <label for="age">Geboortedatum *</label>
        <input type="date" id="age" name="age" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" required><br><br>

        <input type="submit" value="Registreren">
    </form>
</div>