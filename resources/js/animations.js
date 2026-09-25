import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { TextPlugin } from "gsap/all";

gsap.registerPlugin(ScrollTrigger, TextPlugin);

document.addEventListener("DOMContentLoaded", () => {
    // hero section animation
    const tl = gsap.timeline();

    tl.from("#title-hero", {
        opacity: 0,
        x: -70,
        duration: 0.8,
        ease: "power2.out",
    });

    tl.from("#type-writter", {
        text: "",
        duration: 5,
    });

    tl.from(
        "#btn-wrap",
        {
            opacity: 0,
            x: -70,
            duration: 0.8,
            ease: "power2.out",
        },
        "-=4.5",
    );
    tl.from(
        ".container #carouselId",
        {
            opacity: 0,
            x: 50,
            ease: "power2.out",
        },
        "-=4",
    );

    // CREATE AUTO INCRE TEPAT WAKTU DAN PESANAN
    const elTime = document.querySelector("#tepat-waktu");
    const elPesanan = document.querySelector("#pesanan");
    const elRating = document.querySelector("#rating");
    let obj = { valTime: 0, valPesanan: 0, valRating: 0 };

    gsap.to(obj, {
        valTime: 97,
        ease: "power1.out",
        duration: 4,
        onUpdate: () => {
            elTime.textContent = Math.round(obj.valTime).toLocaleString() + "%";
        },
    });

    gsap.to(obj, {
        valPesanan: 10,
        ease: "power1.out",
        duration: 2,
        onUpdate: () => {
            elPesanan.textContent =
                Math.round(obj.valPesanan).toLocaleString() + "Rb+";
        },
    });

    gsap.to(obj, {
        valRating: 4.8,
        ease: "power1.out",
        duration: 2,
        onUpdate: () => {
            elRating.textContent = obj.valRating.toFixed(1) + "/5";
        },
    });
});

// ANIMASI ULASAN PENGGUNA
gsap.from("#testimoni-title", {
    scrollTrigger: {
        trigger: "#testimoni-title",
        markers: true,
        start: "top 80%",
    },
    y: -50,
    duration: 0.8,
    ease: "power2.out",
    opacity: 0,
});
gsap.from("#card-content > *", {
    scrollTrigger: {
        trigger: "#testimoni-title",
        markers: true,
        start: "top 80%",
    },
    y: (index) => {
        return index % 2 == 0 ? 50 : -50;
    },
    opacity: 0,
    duration: 0.5,
    filter: "blur(10px)",
    ease: "power2.out",
    stagger: 0.4,
});
