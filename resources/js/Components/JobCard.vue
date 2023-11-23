<template>
        <div class="col">
            <div class="card shadow-sm mt-5 ">
                <div class="card-header text-center">This is My Card</div>
                <div class="card-body">
                    <img src="https://imgs.search.brave.com/WOzmQg47yABEdgeRUej4PNdvnDJ-keqsKBFfCFByRT4/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTg1/MDExNzYzL3Bob3Rv/L3Nob2VzLmpwZz9z/PTYxMng2MTImdz0w/Jms9MjAmYz1peVJn/aWR6eDN6cWNGX1hT/UzlrY3JLYW0xaXkw/VVg5bE1GTUlCS3c3/WDJZPQ" class="card-img-top" alt="...">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit minima, quo fugit, cupiditate quod quidem blanditiis sapiente assumenda obcaecati quis, nobis recusandae. Et omnis culpa cum laboriosam repudiandae, modi accusantium.</p>
                     <PrimaryButton>Apply</PrimaryButton>
                </div>
            </div>   
        </div>
</template>
<script>
import PrimaryButton from '../Components/PrimaryButton.vue';

  export default
  {
    components: { PrimaryButton }
}
</script>