import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", () => {
    // hero section animation
    const tl = gsap.timeline();

    tl.from("#title-hero > *", {
        opacity: 0,
        x: -70,
        duration: 0.8,
        stagger: 0.3,
        ease: "power2.out",
    });

    tl.from(
        ".container #carouselId",
        {
            opacity: 0,
            x: 50,
            ease: "power2.out",
        },
        "-=0.5",
    );
});

// ANIMASI ULASAN PENGGUNA
gsap.from("#testimoni-title", {
    scrollTrigger: {
        trigger: "#testimoni-title",
        // markers: true,
        start: "top 65%",
    },
    y: -50,
    duration: 0.8,
    ease: "power2.out",
    opacity: 0,
});
gsap.from("#card-content > *", {
    scrollTrigger: {
        trigger: "#testimoni-title",
        // markers: true,
        start: "top 65%",
    },
    y: 50,
    opacity: 0,
    duration: 0.5,
    ease: "power2.Out",
    stagger: 0.4,
});
