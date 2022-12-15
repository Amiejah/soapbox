Livewire.on('blogPostEditing', (el, component) => {
  window.Alpine.store('sidebar').toggle()
});

Livewire.on('blogPostDeleted', (el, component) => {
  window.Alpine.store('sidebar').toggle()
})
Livewire.on('blogPostCreated', (el, component) => {
  window.Alpine.store('sidebar').toggle()
});
