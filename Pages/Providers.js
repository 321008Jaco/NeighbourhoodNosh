document.addEventListener("DOMContentLoaded", function () {
    const foodTypeSelect = document.getElementById("food-type");
    const restaurantSelect = document.getElementById("restaurant");
    const searchInput = document.getElementById("search");
    const foodItems = document.querySelectorAll(".food-item");

    function filterFood() {
        const selectedFoodType = foodTypeSelect.value;
        const selectedRestaurant = restaurantSelect.value.toLowerCase();
        const searchTerm = searchInput.value.toLowerCase();

        foodItems.forEach(item => {
            const itemType = item.getAttribute("data-type");
            const itemRestaurant = item.getAttribute("data-restaurant").toLowerCase();
            const itemName = item.querySelector("h4").textContent.toLowerCase();
            const restaurantName = item.querySelector("p").textContent.toLowerCase();

            // Check if food type, restaurant, or search term match
            const matchesType = selectedFoodType === "all" || itemType === selectedFoodType;
            const matchesRestaurant = selectedRestaurant === "all" || itemRestaurant === selectedRestaurant;
            const matchesSearch = itemName.includes(searchTerm) || restaurantName.includes(searchTerm);

            if (matchesType && matchesRestaurant && matchesSearch) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    }

    // Event listeners for filtering
    foodTypeSelect.addEventListener("change", filterFood);
    restaurantSelect.addEventListener("change", filterFood);
    searchInput.addEventListener("input", filterFood);
});
