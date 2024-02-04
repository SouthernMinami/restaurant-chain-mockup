<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting Form</title>
</head>

<body>
    <form action="download.php" method="post">
        <label for="employeeCount">Number of Employees</label>
        <input type="number" name="employeeCount" id="employeeCount" min="1" max="10" value="3">

        <label for="salaryMin">Salary Min($)</label>
        <input type="number" name="salaryMin" id="salaryMin" min="100" max="99999" value="100">
        <label for="salaryMax">Salary Max($)</label>
        <input type="number" name="salaryMax" id="salaryMax" min="100" max="99999" value="100000">

        <label for="restaurantCount">Number of Restaurants</label>
        <input type="number" name="restaurantCount" id="restaurantCount" min="1" max="10" value="3">

        <label>Postal Code Range</label>
        <label for="postalCodeMin">Min:</label>
        <input type="text" name="postalCodeMin" id="postalCodeMin" placeholder="10000-1000" required>
        <label for="max">Max:</label>
        <input type="text" name="postalCodeMax" id="postalCodeMax" placeholder="99999-9999" required>

        <label for=" format">Download Format:</label>
        <select name="format" id="format">
            <option value="html">HTML</option>
            <option value="markdown">Markdown</option>
            <option value="json">JSON</option>
            <option value="txt">Plain Text</option>
        </select>

        <button type="submit">Generate</button>
    </form>
</body>