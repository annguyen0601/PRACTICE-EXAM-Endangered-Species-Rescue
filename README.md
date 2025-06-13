# Endangered Species Rescue Mission

This project is a Laravel API for managing rescue missions to save endangered species. It lets you select a rescue location, assign wildlife experts, and determine if the mission is successful based on the team's combined effectiveness.

## 🚀 Getting Started

**Backend Setup**

1. Clone the repo:

```bash
git clone https://github.com/annguyen0601/endangered-species-rescue-api.git
cd endangered-species-rescue-api
```

2. Install dependencies:

```bash
composer install
```

3. Set up your environment:
    - Copy `.env.example` to `.env`
    - Set up SQLite:

```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

    - Generate app key:

```bash
php artisan key:generate
```

4. Run migrations and seed the database:

```bash
php artisan migrate
php artisan db:seed
```

5. Start the server:

```bash
php artisan serve
```


## 📝 API Endpoints

- `GET /api/locations` – List all locations.
- `GET /api/experts` – List all experts.
- `POST /api/mission` – Submit a rescue mission (requires token).


## 🔐 Authentication

All POST requests to `/api/mission` must include this header:

```
Authorization: Bearer SAVE-THE-WILD
```


## 📦 Example Request Body

When submitting a rescue mission, send a JSON body like this:

```json
{
  "leader_email": "jane.doe@example.com",
  "location_id": 3,
  "experts": [4, 7, 12]
}
```

- `leader_email`: The team leader’s email (required, must be valid).
- `location_id`: The ID of the rescue location (required, must exist).
- `experts`: An array of expert IDs assigned to the mission (required, must exist).


## 🔗 How It Works

- Each expert’s effectiveness is calculated as:
`(experience * 2) + knowledge`
- The sum of all selected experts’ effectiveness is compared to the location’s threat level.
- If the team’s total effectiveness meets or exceeds the threat level, the mission is a success!
- After submission, the leader receives a summary email from `rescue-mission@wildlife.org` ("Rescue Control").


## 🧑‍💻 Example Response

On success:

```json
{
  "message": "Rescue at Amazon Rainforest was a success thanks to Alice, John.",
  "success": true
}
```

On failure:

```json
{
  "message": "Rescue at Arctic Tundra failed due to low effectiveness of Bob, Eve.",
  "success": false
}
```
