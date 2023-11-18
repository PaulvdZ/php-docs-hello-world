<?php
// Define your users and passwords

$valid_users = array(
    'paul' => 'password',
    'esther' => 'password',
    'Sim' => 'password',
    'Justa' => 'password',
);

// Check if the user has entered a valid username and password
if (
    !isset($_SERVER['PHP_AUTH_USER']) ||
    !isset($_SERVER['PHP_AUTH_PW']) ||
    !array_key_exists(strtolower($_SERVER['PHP_AUTH_USER']), array_change_key_case($valid_users, CASE_LOWER)) ||
    $valid_users[strtolower($_SERVER['PHP_AUTH_USER'])] !== $_SERVER['PHP_AUTH_PW']
) {
    // If not, send headers requesting authentication
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication Required';
    exit;
}



// Hardcoded data
$contacts = [
    ['id' => 1, 'naam' => 'Paul', 'Telefoon' => '06-13781171'],
    ['id' => 2, 'naam' => 'Esther', 'Telefoon' => '06-18157519'],
    ['id' => 3, 'naam' => 'Sim', 'Telefoon' => '06-10334784'],
    ['id' => 4, 'naam' => 'Justa', 'Telefoon' => '06-30762292']
];

// Output data in a table
echo "<table>
        <tr>
            <th>Naam</th>
            <th>Telefoon</th>
        </tr>";

foreach ($contacts as $contact) {
    echo "<tr>
            <td>{$contact['naam']}</td>
            <td>{$contact['Telefoon']}</td>
          </tr>";
}

echo "</table>";
?>