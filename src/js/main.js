/*!
 *
 *  Web Starter Kit
 *  Copyright 2015 Google Inc. All rights reserved.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *    https://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License
 *
 */
/* eslint-env browser */
(function() {
    'use strict';

    // Your custom JavaScript goes here
    var nav = document.getElementById('nav-burger-menu');
    var menuList = document.getElementById('nav-menu-list');
    var overlay = document.getElementById('site-overlay');
    var body = document.getElementsByTagName('body');

    nav.onclick = function() {
        if (nav.classList.contains('open')) {
            close();
        } else {
            open();
        }
    };

    overlay.onclick = close;

    function open() {
        nav.classList.add('open');
        overlay.style.display = '';
        menuList.classList.add('slideLeft');
        menuList.classList.remove('slideRight');
        menuList.classList.remove('resting');
        menuList.classList.add('slide');
        body[0].classList.add('stop-scrolling');
    }

    function close() {
        nav.classList.remove('open');
        overlay.style.display = 'none';
        menuList.classList.add('slideRight');
        menuList.classList.remove('slideLeft');
        menuList.classList.add('resting');
        menuList.classList.remove('slide');
        body[0].classList.remove('stop-scrolling');
    }
})();