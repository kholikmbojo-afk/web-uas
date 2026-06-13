<?php
include 'includes/header.php';
include 'includes/navbar.php';

$teams = [

["Argentina","A","🇦🇷"],
["Brazil","A","🇧🇷"],
["France","B","🇫🇷"],
["Spain","B","🇪🇸"],
["Germany","C","🇩🇪"],
["England","C","🏴"],
["Portugal","D","🇵🇹"],
["Netherlands","D","🇳🇱"],
["Belgium","E","🇧🇪"],
["Croatia","E","🇭🇷"],
["Japan","F","🇯🇵"],
["South Korea","F","🇰🇷"],
["Mexico","G","🇲🇽"],
["USA","G","🇺🇸"],
["Canada","H","🇨🇦"],
["Morocco","H","🇲🇦"]

];
?>

<style>

.page-title{
    text-align:center;
    margin:120px 0 20px;
    font-size:50px;
    color:#081f5c;
}

.page-subtitle{
    text-align:center;
    color:#666;
    margin-bottom:40px;
}

.search-box{
    width:90%;
    max-width:500px;
    margin:auto;
    margin-bottom:50px;
}

.search-box input{
    width:100%;
    padding:15px;
    border:none;
    border-radius:12px;
    box-shadow:0 4px 15px rgba(0,0,0,.1);
    font-size:16px;
}

.team-grid{
    width:90%;
    margin:auto;

    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(260px,1fr));

    gap:25px;

    margin-bottom:80px;
}

.team-card{

    background:white;

    border-radius:20px;

    padding:25px;

    text-align:center;

    box-shadow:
    0 5px 15px rgba(0,0,0,.08);

    transition:.3s;
}

.team-card:hover{
    transform:translateY(-8px);
}

.flag{
    font-size:70px;
}

.team-name{
    margin-top:15px;
    font-size:24px;
    font-weight:bold;
    color:#081f5c;
}

.group-badge{

    display:inline-block;

    margin-top:10px;

    background:#ffd700;

    color:#000;

    padding:8px 15px;

    border-radius:30px;

    font-weight:bold;
}

.team-info{
    margin-top:15px;
    color:#666;
}

.stats-section{

    width:90%;

    margin:auto;

    margin-bottom:60px;

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(250px,1fr));

    gap:20px;
}

.stat-card{

    background:#081f5c;

    color:white;

    padding:30px;

    border-radius:20px;

    text-align:center;
}

.stat-card h2{
    font-size:45px;
}

@media(max-width:768px){

    .page-title{
        font-size:36px;
    }

    .flag{
        font-size:55px;
    }

}

</style>

<h1 class="page-title">
🏆 Qualified Teams
</h1>

<p class="page-subtitle">
FIFA World Cup 2026 Participants
</p>

<div class="stats-section">

    <div class="stat-card">
        <h2>48</h2>
        <p>Total Teams</p>
    </div>

    <div class="stat-card">
        <h2>16</h2>
        <p>Host Cities</p>
    </div>

    <div class="stat-card">
        <h2>104</h2>
        <p>Total Matches</p>
    </div>

</div>

<div class="search-box">

    <input
    type="text"
    id="searchTeam"
    placeholder="Search Team...">

</div>

<div class="team-grid" id="teamContainer">

<?php foreach($teams as $team): ?>

<div class="team-card">

    <div class="flag">
        <?= $team[2] ?>
    </div>

    <div class="team-name">
        <?= $team[0] ?>
    </div>

    <div class="group-badge">
        Group <?= $team[1] ?>
    </div>

    <div class="team-info">
        Qualified for FIFA World Cup 2026
    </div>

</div>

<?php endforeach; ?>

</div>

<script>

const search =
document.getElementById("searchTeam");

search.addEventListener("keyup", function(){

    let keyword =
    this.value.toLowerCase();

    let cards =
    document.querySelectorAll(".team-card");

    cards.forEach(card=>{

        let text =
        card.innerText.toLowerCase();

        if(text.includes(keyword)){
            card.style.display="block";
        }else{
            card.style.display="none";
        }

    });

});

</script>

<?php include 'includes/footer.php'; ?>