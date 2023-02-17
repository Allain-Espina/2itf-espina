<?php
$salary = isset($_POST['input']);

function annualSalary()
{
    if (isset($_POST['Compute']) && isset($_POST['radio']) && isset($_POST['input'])) {
        $rbGroup = $_POST['radio'];
        $salary = $_POST['input'];
    } else {
        $rbGroup = NULL;
    }

    if ($rbGroup != NULL) {
        if (is_numeric($salary)) {
            if ($rbGroup == "Bi-Monthly") {
                $annualSalary = $salary * 24;
                return $annualSalary;
            } else if ($rbGroup == "Monthly") {
                $annualSalary = $salary * 12;
                return $annualSalary;
            }
        } else {
            return $salary;
        }
    }
}

function estAnnualTax()
{
    if (isset($_POST['Compute']) && isset($_POST['radio']) && isset($_POST['input'])) {
        $rbGroup = $_POST['radio'];
        $salary = $_POST['input'];
    } else {
        $rbGroup = NULL;
    }

    if ($rbGroup != NULL) {
        if (is_numeric($salary)) {
            if ($rbGroup == "Bi-Monthly") {
                $salary = $_POST['input'];
                $salary *= 24;
                if (250000 > $salary) {
                    echo "NO TAXES TO BE PAID!";
                    return 0;
                } elseif (250000 < $salary && $salary <= 400000) {
                    $excess = $salary - 250000;
                    $estAnnualTax = $excess * 0.2;
                    return $estAnnualTax;
                } elseif (400000 < $salary && $salary <= 800000) {
                    $excess = $salary - 400000;
                    $estAnnualTax = $excess * 0.25 + 30000;
                    return $estAnnualTax;
                } elseif (800000 < $salary && $salary <= 2000000) {
                    $excess = $salary - 800000;
                    $estAnnualTax = $excess * 0.3 + 130000;
                    return $estAnnualTax;
                } elseif (2000000 < $salary && $salary <= 8000000) {
                    $excess = $salary - 2000000;
                    $estAnnualTax = $excess * 0.32 + 490000;
                    return $estAnnualTax;
                } elseif (800000 < $salary) {
                    $excess = $salary - 8000000;
                    $estAnnualTax = $excess * 0.35 + 2410000;
                    return $estAnnualTax;
                }
            } else if ($rbGroup == "Monthly") {
                $salary = $_POST['input'];
                $salary *= 12;
                if (250000 > $salary) {
                    echo "NO TAXES TO BE PAID!";
                    return 0;
                } elseif (250000 < $salary && $salary <= 400000) {
                    $excess = $salary - 250000;
                    $estAnnualTax = $excess * 0.2;
                    return $estAnnualTax;
                } elseif (400000 < $salary && $salary <= 800000) {
                    $excess = $salary - 400000;
                    $estAnnualTax = $excess * 0.25 + 30000;
                    return $estAnnualTax;
                } elseif (800000 < $salary && $salary <= 2000000) {
                    $excess = $salary - 800000;
                    $estAnnualTax = $excess * 0.3 + 130000;
                    return $estAnnualTax;
                } elseif (2000000 < $salary && $salary <= 8000000) {
                    $excess = $salary - 2000000;
                    $estAnnualTax = $excess * 0.32 + 490000;
                    return $estAnnualTax;
                } elseif (800000 < $salary) {
                    $excess = $salary - 8000000;
                    $estAnnualTax = $excess * 0.35 + 2410000;
                    return $estAnnualTax;
                }
            }
        } else {
            return $salary;
        }
    }
}

function EstMonthlyTax()
{
    if (isset($_POST['Compute']) && isset($_POST['radio']) && isset($_POST['input'])) {
        $rbGroup = $_POST['radio'];
        $salary = $_POST['input'];
    } else {
        $rbGroup = NULL;
    }

    if ($rbGroup != NULL) {
        if (is_numeric($salary)) {
            if ($rbGroup == "Bi-Monthly") {
                $estAnnualTax = estAnnualTax();
                $estMonthlyTax = $estAnnualTax / 12;
                return $estMonthlyTax;
            } else if ($rbGroup == "Monthly") {
                $estAnnualTax = estAnnualTax();
                $estMonthlyTax = $estAnnualTax / 12;
                return $estMonthlyTax;
            }
        } else {
            return $salary;
        }
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <title>Taxxy: A Mini Tax Calculator Web App</title>
    <link type="text/css" rel="stylesheet" href="PA-1.css" />

</head>

<body>
    <br>
    <h1>
        Taxxy: A Tax Calculator
    </h1>
    <br>
    <h4>
        Created by: Allain Daniel Espina
    </h4>
    <br>
    <form method="POST">
        <table id="input">
            <tr>
                <td>
                    <br>
                    <label><strong>Salary: </strong></label>
                </td>
                <td>
                    <br>
                    <input id="salary" name="input" input>
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                    <label id="type"><strong>Type:</strong></label>
                </td>
                <td>
                    <div class="radio-button">
                        <input type="radio" name="radio" class="Bi-Monthly" value="Bi-Monthly">
                        <label>
                            BI-MONTHLY
                        </label>
                        <input type="radio" name="radio" class="Monthly" value="Monthly">
                        <label>
                            MONTHLY
                        </label>
                    </div>
                </td>
            </tr>
        </table>

        <div id="computebutton">
            <br>
            <button name="Compute" class="button compute">COMPUTE / (CE)</button>
        </div>

        <table id="output">
            <tr>
                <td>
                    <br>
                    <label>Annual Salary:</label>
                </td>
                <td>
                    &ensp;&ensp;&ensp;&ensp;&ensp;
                </td>
                <td style="width:150px">
                    <br>
                    <strong>
                        <?php
                        $annualSalary = annualSalary();
                        if (is_numeric($annualSalary)) {
                            echo '<span class="green">PHP ' . number_format((float)$annualSalary, 2, '.', ',');
                        } elseif (is_string($annualSalary)) {
                            $salary = $_POST['input'];
                            echo '<span class="red">PHP 0.00';
                        } elseif ($annualSalary == "") {
                            echo "PHP " . number_format((float)$annualSalary, 2, '.', ',');
                        }
                        ?>
                    </strong>
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    <label>Est. Annual Tax:</label>
                </td>
                <td>

                </td>
                <td>
                    <br>
                    <strong>
                        <?php
                        $estAnnualTax = estAnnualTax();
                        if (is_numeric($estAnnualTax)) {
                            echo '<span class="green">PHP ' . number_format((float)$estAnnualTax, 2, '.', ',');
                        } elseif (is_string($estAnnualTax)) {
                            $salary = $_POST['input'];
                            echo '<span class="red">PHP 0.00';
                        } elseif ($estAnnualTax == "") {
                            echo "PHP " . number_format((float)$estAnnualTax, 2, '.', ',');
                        }
                        ?>
                    </strong>
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    <label>Est. Monthly Tax:</label>
                </td>
                <td>

                </td>
                <td>
                    <br>
                    <strong>
                        <?php
                        $estMonthlyTax = EstMonthlyTax();
                        if (is_numeric($estMonthlyTax)) {
                            echo '<span class="green">PHP ' . number_format((float)$estMonthlyTax, 2, '.', ',');
                        } elseif (is_string($estMonthlyTax)) {
                            $salary = $_POST['input'];
                            echo '<span class="red">PHP 0.00';
                        } elseif ($estMonthlyTax == "") {
                            echo "PHP " . number_format((float)$estMonthlyTax, 2, '.', ',');
                        }
                        ?>
                    </strong>
                </td>
            </tr>
        </table>
        <br>
        <div id="error">
            <?php
            $annualSalary = annualSalary();
            if (is_string($annualSalary)) {
                $salary = $_POST['input'];
                echo '<strong>*** ERROR ***</strong> <br> The System STRICTLY accepts Numeric Values ONLY. <br>"<strong>' .  $salary . '"</strong> is or may contain a Non-Numeric Value.';
            }
            ?>
        </div>
    </form>

</body>

</html>