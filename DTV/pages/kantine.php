<?php

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Kantine</title>
    <link rel="stylesheet" href="../css/kantine.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let snacks = document.getElementsByClassName('snack-card');
            let drinks = document.getElementsByClassName('drink-card');

            filter.onchange = function() {
                let x = document.getElementById("kantineSelect").value;

                if (x == "all") {
                    for(let i = 0; i < snacks.length; i++){snacks[i].style.display = 'block';}
                    for(let i = 0; i < drinks.length; i++){drinks[i].style.display = 'block';}
                }
                if (x == "snack") {
                    for(let i = 0; i < snacks.length; i++){snacks[i].style.display = 'block';}
                    for(let i = 0; i < drinks.length; i++){drinks[i].style.display = 'none';}
                }
                if (x == "drink") {
                    for(let i = 0; i < snacks.length; i++){snacks[i].style.display = 'none';}
                    for(let i = 0; i < drinks.length; i++){drinks[i].style.display = 'block';}
                }
            }
        });
    </script>
</head>

<body>
    <?php include('header.php'); ?>
    
        <div class="kantine-container">

            <div class="kantine-filter">
                <select id="kantineSelect">
                    <option value="all">ALLES</option>
                    <option value="snack">SNACKS</option>
                    <option value="drink">DRINKS</option>
                </select>
            </div>

            <div class="kantine-item-card snack-card" id="snack">
                <div class="item_Card-Top">
                    <div class="img-container" style="background-image: url('../images/340x260.png');;">
                        <div class="identifier snack">
                            <span>SNACK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div>

            <div class="kantine-item-card drink-card" id="drink">
                <div class="item_Card-Top">
                    <div class="img-container">
                        <div class="identifier drink">
                            <span>DRINK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div>
            <div class="kantine-item-card snack-card" id="snack">
                <div class="item_Card-Top">
                    <div class="img-container" style="background-image: url('../images/340x260.png');;">
                        <div class="identifier snack">
                            <span>SNACK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div>

            <div class="kantine-item-card drink-card" id="drink">
                <div class="item_Card-Top">
                    <div class="img-container">
                        <div class="identifier drink">
                            <span>DRINK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div><div class="kantine-item-card snack-card" id="snack">
                <div class="item_Card-Top">
                    <div class="img-container" style="background-image: url('../images/340x260.png');;">
                        <div class="identifier snack">
                            <span>SNACK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div>

            <div class="kantine-item-card drink-card" id="drink">
                <div class="item_Card-Top">
                    <div class="img-container">
                        <div class="identifier drink">
                            <span>DRINK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div><div class="kantine-item-card snack-card" id="snack">
                <div class="item_Card-Top">
                    <div class="img-container" style="background-image: url('../images/340x260.png');;">
                        <div class="identifier snack">
                            <span>SNACK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div>

            <div class="kantine-item-card drink-card" id="drink">
                <div class="item_Card-Top">
                    <div class="img-container">
                        <div class="identifier drink">
                            <span>DRINK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div><div class="kantine-item-card snack-card" id="snack">
                <div class="item_Card-Top">
                    <div class="img-container" style="background-image: url('../images/340x260.png');;">
                        <div class="identifier snack">
                            <span>SNACK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div>

            <div class="kantine-item-card drink-card" id="drink">
                <div class="item_Card-Top">
                    <div class="img-container">
                        <div class="identifier drink">
                            <span>DRINK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div><div class="kantine-item-card snack-card" id="snack">
                <div class="item_Card-Top">
                    <div class="img-container" style="background-image: url('../images/340x260.png');;">
                        <div class="identifier snack">
                            <span>SNACK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div>

            <div class="kantine-item-card drink-card" id="drink">
                <div class="item_Card-Top">
                    <div class="img-container">
                        <div class="identifier drink">
                            <span>DRINK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div><div class="kantine-item-card snack-card" id="snack">
                <div class="item_Card-Top">
                    <div class="img-container" style="background-image: url('../images/340x260.png');;">
                        <div class="identifier snack">
                            <span>SNACK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div>

            <div class="kantine-item-card drink-card" id="drink">
                <div class="item_Card-Top">
                    <div class="img-container">
                        <div class="identifier drink">
                            <span>DRINK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div><div class="kantine-item-card snack-card" id="snack">
                <div class="item_Card-Top">
                    <div class="img-container" style="background-image: url('../images/340x260.png');;">
                        <div class="identifier snack">
                            <span>SNACK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div>

            <div class="kantine-item-card drink-card" id="drink">
                <div class="item_Card-Top">
                    <div class="img-container">
                        <div class="identifier drink">
                            <span>DRINK</span>
                        </div>
                    </div>
                </div>
                <div class="card-info">
                    <p><strong>Naam:</strong> <span>snacker decker</span> <strong>Prijs:</strong> <span>$99,99</span></p>
                    <p><strong>Category:</strong> <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae quibusdam commodi quas, veniam qui, cupiditate distinctio tempora totam laudantium necessitatibus voluptate!</span></p>
                </div>
            </div>
            
        </div>
        
    <?php include('footer.php'); ?>

</body>

</html>