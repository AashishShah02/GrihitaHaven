<html>
    <style>
        .header {
    background: #1E90FF;
    color: white;
    padding: 10px 20px;
    text-align: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
}


/* General styling for the stats section */
.stats {
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap; /* Makes it responsive */
    gap: 20px;
    padding: 20px;
    background-color: #f8f9fa; /* Light background for contrast */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px 0;
}

/* Individual stat card styling */
.stat-card {
    background: linear-gradient(145deg, #e3e3e3, #ffffff); /* Subtle gradient */
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    width: 200px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

/* Stat card heading */
.stat-card h3 {
    font-size: 1.2rem;
    font-weight: 600;
    color: #4CAF50; /* Green tone */
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

/* Stat card icons */
.stat-card h3 i {
    color: #4CAF50; /* Match the color tone */
}

/* Stat card numbers */
.stat-card p {
    font-size: 2rem;
    font-weight: 700;
    color: #333;
    margin: 0;
}

    </style>
    <div class="header">
    <h1>User Management Dashboard</h1>
</div>
</html>