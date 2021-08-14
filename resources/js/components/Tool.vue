<template>
<div class="p-5 hidden md:block">
    <div class="mx-4 p-4">
        <div class="flex items-center">
            <div class="flex-auto my-auto border-0 border-gray-500"></div>
            <span v-for="step in steps" :key="step.id" class="flex flex-auto flex-row" >
            <div class="flex flex-col items-center text-green-600 relative">
                <div class="rounded-full h-16 w-16 flex items-center justify-center border-2"
                    v-bind:class="{
                        'border-green-600': isCompleted(step) || isActive(step),
                        'bg-white': isCompleted(step),
                        'text-green-600': isCompleted(step),

                        'bg-green-600': isActive(step),
                        'text-white': isActive(step),

                        'border-gray-500': isIncomplete(step),
                        'text-gray-600': isIncomplete(step),

                        }">{{ step.id + 1 }}</div>

                <div class="absolute mt-20 text-center w-24 text-xs font-medium uppercase"
                    v-bind:class="{
                        'text-green-600': isActive(step) || isCompleted(step),
                        'text-gray-600': isIncomplete(step)
                        }"
                        >{{ step.title }}</div>
            </div>

            <div v-if="step.id < steps.length - 1" class="flex-auto my-auto border-t-2 transition duration-500 ease-in-out "
                v-bind:class="{
                    'border-gray-500': isActive(step) || isIncomplete(step),
                    'border-green-600': isCompleted(step),
                    }"
            ></div>
            </span>
        </div>
    </div>
</div>
</template>

<script>

export default {
  props: ['resourceName', 'resourceId', 'panel'],

  data() {
      return {
          currentStep: '',

          currentStepIndex: 0,

          steps: '',

      }
  },

  methods: {

      isCompleted(step) {

          if (step.id < this.currentStepIndex) {
              return true;
          }

          return false;

      },

      isIncomplete(step) {

          if (step.id > this.currentStepIndex) {
              return true;
          }

          return false;
      },

      isActive(step) {
          if (step.name == this.currentStep) {
              return true;
          };

          return false;
      }
  },

  created() {
      this.currentStep = this.panel.fields[0].currentStep;
      this.steps = this.panel.fields[0].steps;

      var i;

      for(i = 0; i < this.steps.length; i++) {
          if (this.steps[i].name  == this.currentStep) {
              this.currentStepIndex = i;
          }
      }
  },

  mounted() {
    //
  },


}
</script>
