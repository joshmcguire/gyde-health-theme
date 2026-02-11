/**
 * Gyde Health Theme - Main JS
 *
 * @package Gyde_Health
 */

(function () {
  'use strict';

  /* =============================================
     Sticky header - add class on scroll
     ============================================= */
  const header = document.getElementById('site-header');
  if (header) {
    window.addEventListener('scroll', function () {
      header.classList.toggle('is-scrolled', window.scrollY > 60);
    });
  }

  /* =============================================
     Mobile menu toggle
     ============================================= */
  const menuToggle = document.querySelector('.site-header__menu-toggle');
  const nav = document.querySelector('.site-header__nav');
  if (menuToggle && nav) {
    menuToggle.addEventListener('click', function () {
      nav.classList.toggle('is-open');
    });
  }

  /* =============================================
     Feature cards accordion
     ============================================= */
  const featureItems = document.querySelectorAll('.feature-cards-section__list-item');
  featureItems.forEach(function (item) {
    const trigger = item.querySelector('.feature-cards-section__list-trigger');
    if (trigger) {
      trigger.addEventListener('click', function () {
        // Close all
        featureItems.forEach(function (el) {
          el.classList.remove('is-active');
        });
        // Open clicked
        item.classList.add('is-active');
      });
    }
  });

  /* =============================================
     Blog carousel navigation
     ============================================= */
  const blogCards = document.querySelector('.blog-section__cards');
  const prevBtn = document.querySelector('.blog-section__nav-btn--prev');
  const nextBtn = document.querySelector('.blog-section__nav-btn:not(.blog-section__nav-btn--prev)');

  if (blogCards && prevBtn && nextBtn) {
    var scrollAmount = 440;

    nextBtn.addEventListener('click', function () {
      blogCards.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', function () {
      blogCards.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });
  }

  /* =============================================
     Smooth scroll for anchor links
     ============================================= */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var hash = this.getAttribute('href');
      if (hash.length > 1) {
        var target = document.querySelector(hash);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }
    });
  });

})();
