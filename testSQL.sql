--1
SELECT DISTINCT status 
FROM tasks 
ORDER BY status ASC;

--2
SELECT project_id, COUNT(id) 
FROM tasks 
GROUP BY project_id 
ORDER BY COUNT(id) DESC;

--3
SELECT p.name, COUNT(t.id) 
FROM projects p, tasks t 
WHERE t.project_id = p.id 
GROUP BY p.name 
ORDER BY p.name ASC;

--4
SELECT * 
FROM tasks 
WHERE LEFT(name, 1) = "N";

--5
SELECT p.name, COUNT(t.id) 
FROM projects p 
LEFT OUTER JOIN tasks t ON p.id = t.project_id 
WHERE p.name LIKE '_%a%_' 
GROUP BY p.name;

--6
SELECT * 
FROM tasks 
GROUP BY name 
HAVING COUNT(*) > 1 
ORDER BY name;

--7
SELECT t.* , COUNT( * ) 
FROM tasks t, projects p
WHERE p.name = "Garage"
AND p.id = t.project_id
GROUP BY t.name, t.status
ORDER BY COUNT( * );

--8
SELECT * 
FROM projects
WHERE id
IN (
	SELECT project_id
	FROM tasks
	WHERE STATUS = "done"
	GROUP BY project_id
	HAVING COUNT( * ) > 10
);
