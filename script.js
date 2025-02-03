// Initialize Three.js scene, camera, and renderer
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({ antialias: true });

// Set up the product viewer container
const productViewer = document.getElementById('product-viewer');
renderer.setSize(productViewer.clientWidth, productViewer.clientHeight);
productViewer.appendChild(renderer.domElement);

// Load a 3D model (replace 'model.glb' with your 3D model file)
const loader = new THREE.GLTFLoader();
loader.load('model.glb', function(gltf) {
    const model = gltf.scene;
    scene.add(model);

    // Scale and position the model
    model.scale.set(2, 2, 2);
    model.position.y = -1;
}, undefined, function(error) {
    console.error('An error occurred while loading the 3D model:', error);
});

// Add ambient light for better visibility
const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
scene.add(ambientLight);

// Add directional light
const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
directionalLight.position.set(5, 5, 5);
scene.add(directionalLight);

// Set up the camera
camera.position.z = 5;

// Enable orbit controls for user interaction
const OrbitControls = THREE.OrbitControls;
const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true; // Smooth movement
controls.dampingFactor = 0.05;

// Render loop
function animate() {
    requestAnimationFrame(animate);
    controls.update(); // Update controls
    renderer.render(scene, camera);
}
animate();

// Handle resizing the window
window.addEventListener('resize', () => {
    const width = productViewer.clientWidth;
    const height = productViewer.clientHeight;

    camera.aspect = width / height;
    camera.updateProjectionMatrix();

    renderer.setSize(width, height);
});