# Intro
Project originally focused on developing better CSS and JS skills. Along the way I have found limitation of just basic CSS which made me learn how to use Sass along with its features.
I decided to use Sass so I can divide frontend code into multiple sections which made code much more readable. 
After developing frontend side which was the main focus on this project, I have also decided to implement backend funcionality because the site was too bland.
Having already programmed basic backend API on Java I have decided to learn PHP and use it as a main language for backend.
The final result is a responsive dynamic website made to mimic lightweight real estate portal.

# Frontend
- All frontend related stuff is located in frontend folder. All CSS and PHP(html) files were distributed to folders according to subpages they are used in
- Some shared PHP(html),CSS and JS files were placed in shared folder if they were used on multiple subpages
- In _config.scss are located all shared variables, functions and classes

# Backend
- Backend is made according to MVC model. All backend API is located in backend folder
- It mostly consits of 3 parts: properties API, users API and shared API
- Properties are focused on adding, editing and displaying real estate posts
- Users are focused on handling user login and registration
- Shared contains some useful shared functions such as selectOne or selectAll which allow to efficiently get data from DB
