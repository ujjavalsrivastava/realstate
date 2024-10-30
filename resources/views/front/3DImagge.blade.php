<!DOCTYPE html>
<html>
    <title> 3D Image View</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<body>



<div id="3d-image-container"></div>

<script>
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth/window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.getElementById('3d-image-container').appendChild(renderer.domElement);

//const texture = new THREE.TextureLoader().load("{{public_path('assets/images/bg/bg-15.jpg')}}");
const texture = new THREE.TextureLoader().load("{{asset('images')}}/{{$img}}", 
    () => console.log("Image loaded successfully!"),
    undefined,
    (err) => console.error("Error loading image:", err)
);
const geometry = new THREE.BoxGeometry(2, 2, 0.1); // Adjust depth here
const material = new THREE.MeshBasicMaterial({ map: texture });
const cube = new THREE.Mesh(geometry, material);

scene.add(cube);
camera.position.z = 2;

function animate() {
    requestAnimationFrame(animate);
    cube.rotation.x += 0.01;
    cube.rotation.y += 0.005;
    renderer.render(scene, camera);
}
animate();
</script>
</body>
</html>

