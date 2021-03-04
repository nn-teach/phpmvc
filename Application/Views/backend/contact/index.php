<div class="row medium-8 large-7 columns">

    <h3>On est sur la view Admin - Contact - Index</h3>

</div>
    
    
<div class="row medium-8 large-7 columns">

    <h3>Voici la liste des messages du formulaire de contact : </h3>

    <hr>
    
<table>
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>message</th>
        <th>date</th>
      </tr>
    </thead>
    <tbody>

    <?php

    foreach($this->data['contacts'] as $contact)
    {
        echo "<tr>";
        echo "<td>";
        echo $contact->id();
        echo "</td>";
        echo "<td>";
        echo $contact->name();
        echo "</td>";
        echo "<td>";
        echo $contact->email();
        echo "</td>";
        echo "<td>";
        echo $contact->message();
        echo "</td>";
        echo "<td>";
        echo $contact->date();
        echo "</td>";
        echo "</tr>";
    }

    ?>

    </tbody>
</table>

</div>
