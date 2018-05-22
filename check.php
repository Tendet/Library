<?php
$borrower="K50/2341";

$pattern="/^[A-Z][0-9]{2}[\/][0-9]{4}$/";

if (!preg_match($pattern,$borrower))
{
    echo "invalid id";

}
else{
    echo "valid id";
}