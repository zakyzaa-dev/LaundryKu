import { gsap } from "gsap";

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
