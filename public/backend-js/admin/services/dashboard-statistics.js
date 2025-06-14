export async function getDashboardStatistics() {

    const token = localStorage.getItem('token');

    try {
        const response = await axios.get('/api/v1/admin/dashboard-statistics', {
            headers: {
                'Authorization': `Bearer ${token}`,
            }
        });
      //  console.log(response);

        if (response.status === 200 && response.data) {
            const data = response.data;

            // console.log(data);

            return data;
        }
    } catch (error) {
        if (error.response) {
            //  console.error(error);


        }

        return null;
    }

    
}
