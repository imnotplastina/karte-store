<template>
  <div>
    <select :value="modelValue" class="wide" @change="changeOption">
      <option data-display="Short by latest"></option>
      <option
          v-for="option in options"
          :value="option.value"
          :key="option.value"
      >
        {{ option.name }}
      </option>

    </select>
  </div>
</template>

<script>
export default {
  name: 'my-select',
  props: {
    modelValue: {
      type: String
    },
    options: {
      type: Array,
      default: () => []
    }
  },

  mounted() {
    $(document).trigger('changed')
  },

  methods: {
    changeOption(event) {
      this.$emit('update:modelValue', event.target.value);
    }
  }
}
</script>

<style scoped>

</style>