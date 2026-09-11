<?php

function validateCoupon($code)
{
    try {

        if (empty($code)) {
            throw new Exception("Please enter a coupon code.");
        }

        if ($code != "TOPS2024") {
            throw new Exception("Invalid coupon code. Please try another coupon.");
        }

        echo "Coupon applied successfully!";

    } catch (Exception $e) {

        echo "Coupon Error: " . $e->getMessage();

    }
}

// Test
validateCoupon("TOPS2024");

?>
