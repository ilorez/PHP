<?php
    include_once "conx.php";
    $sel = $db_c -> prepare("SELECT `idAvions`, `categorieAvion`, `nombrePlace`, `photo` FROM `avions`");
    $sel -> execute();
    $result = $sel->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../000_bootstrap/css/bootstrap.min.css" />

</head>

<body>


    <div id="search" class="pb-3">
        <h2>Nombre de place minimum</h2>
        <div class="flex-row">
            <input type="number" min="200" max="300" id="searchId" class=" w-25"
                class="justify-content-xl-center align-baseline">
            <button onclick="search()" class="btn btn-success justify-content-xl-center align-baseline">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-search"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
                search
            </button>
        </div>

    </div>
    <table class="table table-dark table-striped text-center">
        <thead>
            <th></th>
            <th>Numero Avion</th>
            <th>Nombre de places</th>
        </thead>
        <tbody>
            <?php
    foreach ($result as $row) {
        // Access individual fields using column names
        // $categorie = $row['categorieAvion'];
        $places = $row['nombrePlace'];
        $photoURL = $row['photo'];
        $id = $row['idAvions'];
    ?>
            <tr>
                <td><a href="./avionInfo.php?id=<?=$id?>"><img src="<?=$photoURL?>" alt="airplane"
                            class="mrounded mx-auto d-block" width="200"></a></td>
                <td><?=$id?></td>
                <td><?=$places?> places</td>
            </tr>
            <?php
    }
   ?>

        </tbody>
    </table>
    <script>
    let inputPlaces = document.getElementById("searchId")
    inputPlaces.addEventListener("change", () => search())
    inputPlaces.addEventListener("input", () => search())

    function search() {
        let inpvalue = document.getElementById("searchId").value;
        if (inpvalue == "") {
            // alert("You didn't enter eny number!");
            return
        }
        inpvalue = parseInt(inpvalue);
        if (inpvalue < 200 || inpvalue > 300) {
            // alert("need to be between 200 and 300");
            return
        }
        let trs = [...document.getElementsByTagName("tr")].slice(1);
        trs.forEach((tr) => {
            numPlaces = parseInt(tr.children[2].innerHTML.replace(/\D/g, ""))
            if (numPlaces < inpvalue) {
                tr.setAttribute("hidden", "");
                return
            }
            tr.removeAttribute("hidden")
        })
        console.log(trs)
    }
    </script>
</body>

</html>