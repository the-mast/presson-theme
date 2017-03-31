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
    var body = document.getElementsByTagName('body')[0];
    var searchIcon = document.getElementById('nav-search');
    var searchBar = document.getElementById('search-bar');
    var resultsSearchBar = document.getElementById('results-search-bar');
    var pressonhead = document.getElementById('pressonhead');
    var searchField = document.getElementsByClassName('search-field')[0];
    var resultsSearchField = document.getElementsByClassName('search-field')[1];

    nav.onclick = function() {
        if (nav.classList.contains('open')) {
            closeMenu();
        } else {
            openMenu();
        }
    };

    searchIcon.onclick = function() {
        if (searchBar.classList.contains('search-close')) {
            openSearch();
        } else {
            closeSearch();
        }
    };

    searchBar.onclick = function() {
        searchField.focus();
    };

    if (resultsSearchBar != null) {
        resultsSearchBar.onclick = function() {
            resultsSearchField.focus();
        };
    }

    overlay.onclick = closeAll;

    function openMenu() {
        pressonhead.classList.add('opaque');
        nav.classList.add('open');
        menuList.classList.add('slideLeft');
        menuList.classList.remove('slideRight');
        menuList.classList.remove('resting');
        menuList.classList.add('slide');

        if (searchBar.classList.contains('search-open')) {
            closeSearchHelper();
        }
        toggle();
    }

    function closeMenu() {
        closeMenuHelper();
    }

    function openSearch() {
        pressonhead.classList.add('opaque');
        searchBar.classList.add('search-open');
        searchBar.classList.remove('search-close');
        if (nav.classList.contains('open')) {
            closeMenuHelper();
        }
        toggle();
        searchField.focus();
    }

    function closeSearch() {
        closeSearchHelper();
    }

    function closeMenuHelper() {
        nav.classList.remove('open');
        menuList.classList.add('slideRight');
        menuList.classList.remove('slideLeft');
        menuList.classList.add('resting');
        menuList.classList.remove('slide');
        pressonhead.classList.remove('opaque');
        toggle();
    }

    function closeAll() {
        closeMenu();
        closeSearch();
        toggle();
    }

    function closeSearchHelper() {
        searchBar.classList.remove('search-open');
        searchBar.classList.add('search-close');
        pressonhead.classList.remove('opaque');
        toggle();
    }

    function toggle() {
        if (overlay.style.display === 'none')
            overlay.style.display = '';
        else
            overlay.style.display = 'none';

        if (body.classList.contains('stop-scrolling'))
            body.classList.remove('stop-scrolling');
        else
            body.classList.add('stop-scrolling');
    }
})();