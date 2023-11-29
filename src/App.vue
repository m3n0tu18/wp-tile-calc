<template>
  <div class="overview_grid">
    <div class="sidebar">
      <label>
        Tile Size (mm):
        <select v-model.number="tileSize">
          <option value="400">400mm</option>
          <option value="500">500mm</option>
        </select>
      </label>
      <label>
        Horizontal (mm):
        <input
          type="number"
          v-model.number="horizontalMM"
          placeholder="Horizontal (mm)"
        />
      </label>
      <label>
        Vertical (mm):
        <input
          type="number"
          v-model.number="verticalMM"
          placeholder="Vertical (mm)"
        />
      </label>
    </div>
    <div class="main_layout">
      <div class="grid" :style="gridStyle">
        <div class="grid-item" v-for="item in gridItems" :key="item"></div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed } from "vue";

export default {
  name: "App",

  setup() {
    const tileSize = ref(500); // Default tile size
    const horizontalMM = ref(1000); // Horizontal input in mm
    const verticalMM = ref(1000); // Vertical input in mm

    // Computed properties for the number of horizontal and vertical tiles
    const horizontalTiles = computed(() =>
      Math.ceil(horizontalMM.value / tileSize.value)
    );
    const verticalTiles = computed(() =>
      Math.ceil(verticalMM.value / tileSize.value)
    );

    // Grid items based on the number of tiles
    const gridItems = computed(() =>
      Array.from(
        { length: horizontalTiles.value * verticalTiles.value },
        (_, i) => i
      )
    );

    // Grid style
    const gridStyle = computed(() => ({
      "grid-template-columns": `repeat(${horizontalTiles.value}, 25px)`,
      "grid-template-rows": `repeat(${verticalTiles.value}, 25px)`,
    }));

    return {
      tileSize,
      horizontalMM,
      verticalMM,
      gridItems,
      gridStyle,
      horizontalTiles,
      verticalTiles,
    };
  },
};
</script>

<style>
.grid {
  display: grid;
  grid-gap: 3px; /* Adjust the gap between grid items */
}

.grid-item {
  width: 100%;
  height: 100%;
  background-color: #ddd; /* Change as needed */
  border: 1px solid #ccc; /* Change as needed */
}

/* * {
  outline: 1px solid red;
} */

.overview_grid {
  /* display: grid;
  
  grid-gap: 10px; */
  display: grid;
  grid-template-columns: 1fr 3fr;
  /* grid-template-columns: repeat( 200px auto-fit, minmax(360px, 1fr)); */
  grid-template-rows: 1fr;
  gap: 30px 30px;
  background: pink;
}

.overview_grid .sidebar {
  display: flex;
  flex-direction: column;
}
.overview_grid .sidebar input {
  margin-bottom: 10px;
}

.overview_grid .main_layout {
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: auto;
  max-height: 600px;
}

/* //:: Between range:: */
@media (600px <= width <= 800px) {
  .overview_grid {
    background: green;
    grid-template-columns: 1fr 1fr;
  }

  /* // CSS Styling here. */
}
/* //:: Less than range:: */
@media (width <= 600px) {
  .overview_grid {
    background: orange;
    grid-template-columns: 1fr;
  }
}
</style>
