<?php include 'header.php'; ?>

    <?php require './inc/whois/master.php'; ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="text" id="domain" name="domain" placeholder="Enter a domain name to lookup" value="<?php $domain; ?>">
      <button type="submit">Search</button>
    </form>

    <?php
    if($domain) {
      $domain = trim($domain);
      if(substr(strtolower($domain), 0, 7) == "http://") $domain = substr($domain, 7);
      if(substr(strtolower($domain), 0, 8) == "https://") $domain = substr($domain, 8);
      if(substr(strtolower($domain), 0, 4) == "www.") $domain = substr($domain, 4);
      if(ValidateIP($domain)) {
        echo "hello before check";
        $result = LookupIP($domain);
      }
      elseif(ValidateDomain($domain)) {
        $result = LookupDomain($domain);
      }
      else die("Invalid Input!");
      echo "<pre>\n" . $result . "</pre>\n";
    }
    ?>

<?php include 'footer.php'; ?>