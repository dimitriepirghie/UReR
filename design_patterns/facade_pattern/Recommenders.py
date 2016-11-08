from AbstractRecommender import AbstractRecommender


class FOAFRecommender(AbstractRecommender):
    """
    Recommender from Friend of a Friend relationship.
    E.g if a friend likes a resource which has a given keyword in naem
    """
    def __init__(self):
        pass

    def recommend_by_keywords(self, key_words_list = []):
        """"""
        pass

    def recommend_by_event(self, event = None):
        pass


class POIsRecommender(AbstractRecommender):
    """
    Recommender for Points of interest or places
    """
    def __init__(self):
        # initialization rutines
        pass

    def recommend_by_keywords(self, key_words_list = []):
        """
        :param key_words_list:
        :return: List of POIs which match keywords from list.
        """
        pass

    def recommend_by_event(self, event = None):
        pass


class EventsRecommender(AbstractRecommender):
    """
    Recommander for events
    """
    def __init__(self):
        pass

    def recommend_by_keywords(self, key_words_list=None):
        """

        :param request:
        :return: List of Events which match keywords from list
        """
        pass

    def recommend_by_event(self, event = None):
        pass
