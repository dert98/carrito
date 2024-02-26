<div>
    <h2>Shopping Cart</h2>
    <ul>
        <li v-for="item in cart" :key="item.id">
            {{ item.name }} - ${{ item.price }}
            <button @click="removeFromCart(item)">Remove</button>
        </li>
    </ul>
    <p>Total: ${{ total }}</p>
</div>