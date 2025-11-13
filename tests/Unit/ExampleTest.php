<?php

test('verify real email', function () {

    $email = "abc@gmail.com";
    $domain = substr(strrchr($email, "@"), 1); // Extract domain from email

    if (checkdnsrr($domain, "MX")) {
        echo "Domain has MX records, likely capable of receiving email.";
    } else {
        echo "Domain does not have MX records, may not be able to receive email.";
    }

    expect(checkdnsrr($domain))->toBeTrue();
});
