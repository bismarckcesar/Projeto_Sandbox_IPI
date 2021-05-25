let id = 1;

//Adição de formulários para refeição
function addMeal() {
    id++

    let meal = document.createElement('input');
    meal.name = "mealName-" + id;
    meal.setAttribute('id', 'meal-' + id);
    meal.placeholder = "Refeição";
    meal.setAttribute('required', 'true');

    let weight = document.createElement('input');
    weight.name = "mealWeight-" + id;
    weight.setAttribute('id', 'weight-' + id);
    weight.placeholder = "Peso em gramas";
    weight.setAttribute('required', 'true');

    let input = document.getElementById('addmeal');
    let form = document.getElementById('meals');
    form.insertBefore(meal, input);
    form.insertBefore(weight, input);
}

//Remoção de formulários para refeição
function removeMeal() {
    if (id > 1) {
        let meal = document.getElementById('meal-' + id);
        meal.remove();
        let weight = document.getElementById('weight-' + id);
        weight.remove();
        id--
    }
}

//Adição do pop-up de pesquisa
function popupSearch() {
    varWindow = window.open('../../index.php', 'popup', "width=660, height=510, top=100, left=300, scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no");
}

//busca do usuário
function search() {
    str = document.getElementById('search').value;

}