<div id="amulette">
    <img src="asset/public/amulette.png" alt="" style="width: 450px;">
    <p>Vous appercevez une amulette, que voulez vous faire?</p>
    <button class="btn btn-dark" onClick="action.randomBonus()">La prendre</button>
    <button class="btn btn-dark" onClick="action.piege()">La Détruire</button>
</div>
<div id="retour"></div>
<script>

const pvMaxHero = '<?= $_SESSION['hero']['pvMax'] ?>' * 1
const manaHeroMax = '<?= $_SESSION['hero']['pmMax'] ?>' * 1 
const atkHero = '<?= $_SESSION['hero']['atk'] ?>' * 1
const defHero = '<?= $_SESSION['hero']['def'] ?>' * 1

const action = new Amulette(pvMaxHero, manaHeroMax, atkHero, defHero)
</script>